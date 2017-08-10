//
//  UITextField+Extension.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 13/05/2017.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

extension UITextField
{
    /// Adds padding in the left of the text field
    ///
    /// - parameter padding: the actual amount for padding in pixel
    ///
    func setLeftPadding(_ padding: CGFloat) {
        self.setPadding(padding, 0)
    }
    
    /// Adds padding in the top of the text field
    ///
    /// - parameter padding: the actual amount for padding in pixel
    ///
    func setTopPadding(_ padding: CGFloat) {
        self.setPadding(0, padding)
    }
    
    /// Adds a layer as a padding within the text field
    ///
    /// - parameter left: position for left starting point
    /// - parameter top:  position for top starting point
    ///
    func setPadding(_ left: CGFloat, _ top: CGFloat) {
        self.layer.sublayerTransform = CATransform3DMakeTranslation(left, top, 0)
    }
    
    func setBottomBorder(height: CGFloat, color: UIColor) {
        self.borderStyle = .none
        self.layer.backgroundColor = UIColor.white.cgColor
        
        self.layer.masksToBounds = false
        self.layer.shadowColor = color.cgColor
        self.layer.shadowOffset = CGSize(width: 0.0, height: height)
        self.layer.shadowOpacity = 1.0
        self.layer.shadowRadius = 0.0
    }
    
    func setPlaceholderText(text: String) {
        self.attributedPlaceholder = NSAttributedString.init(string: text)
    }
    
    func setPlaceholderColor(color: UIColor) {
        setPlaceholder(text: (self.attributedPlaceholder?.string)!, color: color)
    }
    
    func setPlaceholder(text: String, color: UIColor) {
        self.attributedPlaceholder = NSAttributedString.init(string: text, attributes: [NSForegroundColorAttributeName: color])
    }
}
