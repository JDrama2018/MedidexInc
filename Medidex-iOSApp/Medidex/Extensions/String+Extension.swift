//
//  String+Extension.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 13/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import Foundation

extension String {
    var length: Int {
        return self.characters.count
    }
    
    var isNotEmpty: Bool {
        return !self.isEmpty
    }
    
    var localized: String {
        return NSLocalizedString(self, tableName: "Localizable", bundle: Bundle.main, value: "", comment: "")
    }
    
    func localizedWithArguments(_ args : CVarArg...) -> String {
        return withVaList(args) {
            (NSString(format: self.localized, locale: NSLocale.current, arguments: $0) as String)
            } as String
    }
    
    func fromBase64() -> String? {
        guard let data = Data(base64Encoded: self) else {
            return nil
        }
        
        return String(data: data, encoding: .utf8)
    }
    
    func toBase64() -> String {
        return Data(self.utf8).base64EncodedString()
    }
    
    var parseJSONString: Any? {
        
        let data = self.data(using: String.Encoding.utf8, allowLossyConversion: false)
        
        if let jsonData = data {
            // Will return an object or nil if JSON decoding fails
            return try! JSONSerialization.jsonObject(with: jsonData, options: JSONSerialization.ReadingOptions.mutableContainers)
        } else {
            // Lossless conversion of the string was not possible
            return nil
        }
    }
}
