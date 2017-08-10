//
//  PatientDoctorsSearchResultCell.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 27/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

class PatientDoctorsSearchResultCell: UITableViewCell {

    @IBOutlet weak var doctorName: UILabel!
    @IBOutlet weak var address: UILabel!
    @IBOutlet weak var phone: UILabel!
    
    override func awakeFromNib() {
        super.awakeFromNib()
        // Initialization code
    }

    override func setSelected(_ selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)

        // Configure the view for the selected state
    }

    func setRow(_ doctor: FactualDoctor) {
        doctorName.text = doctor.name
        address.text = doctor.address
        phone.text = doctor.phone
    }
    
}
