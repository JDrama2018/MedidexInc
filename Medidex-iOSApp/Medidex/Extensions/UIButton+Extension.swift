//
//  UIButton+Extension.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 12/05/2017.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

extension UIButton
{
    func radius(_ radius: Float) {
        self.layer.cornerRadius = CGFloat(radius)
        self.layer.masksToBounds = true
    }
}
