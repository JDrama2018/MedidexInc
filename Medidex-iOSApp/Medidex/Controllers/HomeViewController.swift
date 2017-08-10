//
//  ViewController.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 12/05/2017.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit
import QuartzCore
import Firebase

class HomeViewController: UIViewController {
    
    // MARK: - ViewController Lifecycle
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        ApiManager.sharedInstance.auth { [weak self] (error, response: [String : Any]?) in
            if let result = response?["result"] as? String {
                if result == "success" {
                    if let accountType = AuthenticationManager.getAccountType() {
                        let controllerName = accountType + "HomeViewController"
                        let storyboard = UIStoryboard(name: accountType, bundle: nil)
                        let controller = storyboard.instantiateViewController(withIdentifier: controllerName) as! UITabBarController
                        self?.present(controller, animated: true, completion: nil)
                    }
                }
            }
        }
    }
    
    override func viewWillAppear(_ animated: Bool) {
        super.viewWillAppear(animated)
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    // MARK: - Customize/Setup View
    
    override func viewDidLayoutSubviews() {
        super.viewDidLayoutSubviews()
        
        customizeLayout()
    }
    
    func customizeLayout() {
        makeButtonsRounded()
        customizeNavigationBar()
    }
    
    func makeButtonsRounded() {
        for button in homeButtons {
            button.radius(4)
        }
    }
    
    func customizeNavigationBar() {
        navigationController?.navigationBar.barTintColor = UIColor(red: (20.0/255.0), green: (129.0/255.0), blue: (18.0/255.0), alpha: 1.0)
        navigationController?.navigationBar.titleTextAttributes = [NSForegroundColorAttributeName: UIColor.white]
    }
    
    @IBOutlet var homeButtons: [UIButton]!
}
