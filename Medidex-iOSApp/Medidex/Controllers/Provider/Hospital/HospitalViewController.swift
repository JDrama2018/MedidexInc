//
//  HospitalViewController.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 19/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

class HospitalViewController: UITableViewController {
    
    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        let controller = segue.destination as! HospitalVisitViewController
        if let index = sender as! IndexPath? {
            controller.linkNum = index.row;
        }
    }
    
    override func tableView(_ tableView: UITableView, didSelectRowAt indexPath: IndexPath) {
        performSegue(withIdentifier: "pushHospitalVisit", sender: indexPath)
    }

}
