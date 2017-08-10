//
//  ProviderAppointmentsTableViewCell.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 20/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

protocol ProviderAppointmentsTableViewCellDelegate {
    func acceptBtnPressed()
    func cancelBtnPressed()
}

class ProviderAppointmentsTableViewCell: UITableViewCell {
    
    var delegate : ProviderAppointmentsTableViewCellDelegate?
    
    @IBOutlet weak var month: UILabel!
    @IBOutlet weak var day: UILabel!
    @IBOutlet weak var year: UILabel!
    
    @IBOutlet weak var fullDate: UILabel!
    @IBOutlet weak var specialty: UILabel!
    @IBOutlet weak var hour: UILabel!
    @IBOutlet weak var place: UILabel!
    
    override func awakeFromNib() {
        super.awakeFromNib()
        // Initialization code
    }

    override func setSelected(_ selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)
    }
    
    // MARK: IBActions
    
    @IBAction func acceptPressed(_ sender: UIButton) {
        delegate?.acceptBtnPressed()
    }
    
    @IBAction func cancelPressed(_ sender: UIButton) {
        delegate?.cancelBtnPressed()
    }
    
    func setRow(_ appointment: Appointment) {
        let date = NSDate(timeIntervalSince1970: TimeInterval(appointment.timestamp!))
        
        let dayFormatter = DateFormatter()
        let monthFormatter = DateFormatter()
        let yearFormatter = DateFormatter()
        let dateFormatter = DateFormatter()
        let hourFormatter = DateFormatter()
        
        dayFormatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "dd", options: 0, locale: nil)
        monthFormatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "MMM", options: 0, locale: nil)
        yearFormatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "yyyy", options: 0, locale: nil)
        dateFormatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "EEEE, MMM d, yyyy", options: 0, locale: nil)
        hourFormatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "h:mm a", options: 0, locale: nil)
        
        month.text = monthFormatter.string(from: date as Date).uppercased()
        day.text = dayFormatter.string(from: date as Date)
        year.text = yearFormatter.string(from: date as Date)
        
        fullDate.text = dateFormatter.string(from: date as Date)
        specialty.text = appointment.specialty
        hour.text = hourFormatter.string(from: date as Date)
        place.text = appointment.place
    }

}
