//
//  NewPatientAppointmentViewController.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 19/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit
import SCLAlertView

class NewPatientAppointmentViewController: KeyboardViewController, UIViewControllerTransitioningDelegate, UIPickerViewDelegate, UIPickerViewDataSource {
    
    var slotTimestamps : Array<Int> = []
    
    // MARK: UI Properties
    
    @IBOutlet weak var specialtyField: UITextField!
    @IBOutlet weak var placeField: UITextField!
    @IBOutlet weak var descriptionField: UITextView!
    @IBOutlet weak var availableSlots: UIPickerView!
    @IBOutlet weak var scheduleButton: UIButton!
    
    // MARK: - ViewController Lifecycle
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        setupPlaceholders()
        setupGestures()
        collectSlots()
        
        self.availableSlots.delegate = self
        self.availableSlots.dataSource = self
    }
    
    // MARK: - Customize/Setup View
    
    override func viewDidLayoutSubviews() {
        super.viewDidLayoutSubviews()
        
        customizeLayout()
    }
    
    required init?(coder aDecoder: NSCoder) {
        super.init(coder: aDecoder)
        self.commonInit()
    }
    
    override init(nibName nibNameOrNil: String!, bundle nibBundleOrNil: Bundle!)  {
        super.init(nibName: nibNameOrNil, bundle: nibBundleOrNil)
        
        self.commonInit()
    }
    
    func commonInit() {
        self.modalPresentationStyle = .custom
        self.transitioningDelegate = self
    }
    
    
    //MARK: UIViewControllerTransitioningDelegate methods
    
    func presentationController(forPresented presented: UIViewController, presenting: UIViewController?, source: UIViewController) -> UIPresentationController? {
        
        if presented == self {
            return CustomPresentationController(presentedViewController: presented, presenting: presenting)
        }
        
        return nil
    }
    
    func animationController(forPresented presented: UIViewController, presenting: UIViewController, source: UIViewController) -> UIViewControllerAnimatedTransitioning? {
        
        if presented == self {
            return CustomPresentationAnimationController(isPresenting: true)
        }
        else {
            return nil
        }
    }
    
    func animationController(forDismissed dismissed: UIViewController) -> UIViewControllerAnimatedTransitioning? {
        
        if dismissed == self {
            return CustomPresentationAnimationController(isPresenting: false)
        }
        else {
            return nil
        }
    }
    
    // MARK: Button actions
    
    @IBAction func dissmissPressed(_ sender: UIButton) {
         self.dismiss(animated: true, completion: nil)
    }
    
    @IBAction func schedulePressed(_ sender: UIButton) {
        saveAppointment()
    }
    
    // MARK: - Picker Delegates/DataSource
    
    // The number of columns of data
    func numberOfComponents(in pickerView: UIPickerView) -> Int {
        return 1
    }
    
    // The number of rows of data
    func pickerView(_ pickerView: UIPickerView, numberOfRowsInComponent component: Int) -> Int {
        return slotTimestamps.count
    }
    
    // Title for picker view
    func pickerView(_ pickerView: UIPickerView, titleForRow row: Int, forComponent component: Int) -> String? {
        if slotTimestamps.count == 0 {
            return "No available slots".localized
        } else {
            let timestamp = slotTimestamps[row]
            let date = NSDate(timeIntervalSince1970: TimeInterval(timestamp))
            
            let formatter = DateFormatter()
            formatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "E, d MMM yyyy HH:mm", options: 0, locale: nil)
            
            return formatter.string(from: date as Date)
        }
    }
    
    
    // MARK: Back-end(database) related helper methods
    
    func collectSlots() {
        Slot.getSlots { [weak self] (error, slots: Array<Slot>?) in
            if error == nil {
                self?.slotTimestamps = Slot.slotTimestamps(slots!)
                self?.availableSlots.reloadAllComponents()
            } else {
                self?.slotTimestamps = []
            }
            debugPrint("response: \(slots) - error: \(error)")
        }
    }
    
    func saveAppointment() {
        if let specialty = self.specialtyField.text,
            let place = self.placeField.text,
            let description = self.descriptionField.text
        {
            let index = self.availableSlots.selectedRow(inComponent: 0)
            let timestamp = slotTimestamps[index]
            
            Appointment.newAppointment(description, specialty, place, timestamp) { (error, response: [String : Any]?) in
                debugPrint("response: \(response) \n error: \(error)")
                if error == nil, let result = response?["result"] as? String {
                    if result == "success" {
                        SCLAlertView().showTitle(
                            "Success".localized,
                            subTitle: "Appointment was successfully saved".localized,
                            duration: 2.0,
                            completeText: "OK",
                            style: .success,
                            colorStyle: 0x1B8F04,
                            colorTextButton: 0xFFFFFF
                        )
                        return
                    }
                }
                SCLAlertView().showTitle(
                    "Error".localized,
                    subTitle: "There was an error while saving the Appointment".localized,
                    duration: 2.0,
                    completeText: "OK",
                    style: .error,
                    colorStyle: 0xD60606,
                    colorTextButton: 0xFFFFFF
                )
            }
        }
    }
    
    // MARK: - Additional UI related Methods
    
    override func setupGestures() {
        super.setupGestures()
    }
    
    func setupPlaceholders() {
        specialtyField.setPlaceholderText(text: "Specialty".localized)
        placeField.setPlaceholderText(text: "Place".localized)
    }
    
    func customizeLayout() {
        scheduleButton.radius(4)
        specialtyField.setLeftPadding(5)
        placeField.setLeftPadding(5)
    }
}
