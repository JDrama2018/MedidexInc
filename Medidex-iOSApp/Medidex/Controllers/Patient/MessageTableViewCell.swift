//
//  MessageTableViewCell.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 15/06/2017.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

class MessageTableViewCell: UITableViewCell {

    @IBOutlet weak var senderAvatar: UIImageView!
    @IBOutlet weak var senderName: UILabel!
    @IBOutlet weak var latestSentDate: UILabel!
    @IBOutlet weak var latestMessage: UILabel!
    
    override func awakeFromNib() {
        super.awakeFromNib()
        // Initialization code
    }

    override func setSelected(_ selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)

        // Configure the view for the selected state
    }

    func setRow(_ data: Conversation) {
        let dateFormatter = DateFormatter()
        let date = Date(timeIntervalSince1970: TimeInterval(data.lastSentTimestamp!))
        
        dateFormatter.dateFormat = DateFormatter.dateFormat(
            fromTemplate: "EEEE, MMM d, yyyy HH:mm:ss",
            options: 0,
            locale: nil
        )
        
        self.senderAvatar.image = UIImage(named: "avatar_default")
        self.senderName.text = data.senderName
        self.latestMessage.text = data.latestMessage
        self.latestSentDate.text = dateFormatter.string(from: date)
    }
}
