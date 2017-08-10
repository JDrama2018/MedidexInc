//
//  AuthenticationManager.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 14/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import KeychainAccess

/// This class is a basic KeychainAccess wrapper
/// Encapsulates all core objectives by providing
/// a simplier wrapper
class AuthenticationManager {
    
    /// Will capture sensitive data for app's global scope
    private static let keychain = Keychain(service: "com.Medidex")
    
    public static func getUsername() -> String? {
        return AuthenticationManager.getValue(key: "username")
    }
    
	public static func tokenByUsername(_ username: String) -> String? {
		return AuthenticationManager.getValue(key: username)
		
		
		//		let keys = keychain.allKeys()
		//		for key in keys {
		//			print("key: \(key)")
		//		}
	}
	
	public static func dumpItems() {
		let items = keychain.allItems()
		for item in items {
			print("item: \(item)")
		}
	}
	
	public static func storeAccount(_ account: [String: Any], _ type: String) {
		
		let username = account["username"] as! String
		let accountId = account["account_id"] as! String
		let api_key = account["access_token"] as! String
		
		do {
			try keychain
				.label(accountId)
				.comment(type)
				.set(api_key, key: username)
		} catch let error {
			print("error: \(error)")
		}
	}
	
	public static func dumpByUsername(_ username: String) {
		//		keychain.attributes(["hello" : "TEST"])
		
		do {
			let attributes = try keychain.get(username) { $0 }
			print(attributes?.comment ?? "")
			print(attributes?.label ?? "")
			print(attributes?.creator ?? "")
		} catch let error {
			print("error: \(error)")
		}
	}
	
	public static func storeAccount(_ account: [String: Any]) {
		
		AuthenticationManager.save(value: account["username"] as! String, key: "username")
		AuthenticationManager.save(value: account["user_id"] as! String, key: "user_id")
		AuthenticationManager.save(value: account["account_id"] as! String, key: "account_id")
		AuthenticationManager.save(value: account["access_token"] as! String, key: "access_token")
	}
	
    public static func setAccountType(_ type: String) {
        AppDelegate.setDefaultValue(type, "accountType")
    }
    
    public static func getAccountType() -> String? {
        return AppDelegate.getValueForKey("accountType")
    }
	
    public static func removeAccount() {
        AuthenticationManager.save(value: "", key: "access_token")
    }
    
    public static func getAccountId() -> String? {
        return AuthenticationManager.getValue(key: "account_id")
    }
    
    public static func getUserId() -> String? {
        return AuthenticationManager.getValue(key: "user_id")
    }
    
    public static func getName() -> String? {
        return AuthenticationManager.getValue(key: "username")
    }
    
    public static func setAccountId(_ accountId: String) {
        AuthenticationManager.save(value: accountId, key: "account_id")
    }
    
    public static func getAccessToken() -> String? {
        return AuthenticationManager.getValue(key: "access_token")
    }
    
    private static func accessTokenExists() -> Bool {
        if let token = getValue(key: "") {
            return token.isNotEmpty
        }
        
        return false
    }
    
    private static func save(value: String, key: String) {
        do {
            try keychain.set(value, key: key)
        }
        catch let error {
            print(error)
        }
    }
    
    private static func removeValue(key: String) {
        do {
            try keychain.remove(key)
        }
        catch let error {
            print(error)
        }
    }
    
    private static func getValue(key: String) -> String? {
        if let value = keychain[key] {
            return value
        }
        return nil
    }
}
