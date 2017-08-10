//
//  AuthenticationRouter.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 14/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import Foundation
import Alamofire


enum AuthenticationRouter: URLRequestConvertible {
    
    private static let API_KEY = "ZWY2ZTE0NmMtOGFiYy00ZWY1LWJjZTMtZGQ0YTI4YzgzM2FhOg=="
    private static let GRP_KEY = "71aca0fe-fff1-489c-ac64-08498495dc8a"
    
    public static let baseURLString = "https://api.truevault.com/v1"
    
    case authenticate(username: String, password: String, accountId: String?)
    case register(username: String, password: String, attributes: [String: Any]?)
    case registerPatient(userId: String, username: String, fullName: String?, token: String?)
    case grantAccess(userId: String)
    case auth()
    case logout()
    
    var method: HTTPMethod {
        switch self {
            case .authenticate, .register, .grantAccess, .registerPatient:
                return .post
            case .auth:
                return .get
            default: return .get
        }
    }
    
    var path: String {
        switch self {
            case .authenticate:
                return "/auth/login"
            case .register:
                return "/users"
            case .auth:
                return "/auth/me"
            case .logout:
                return "/auth/logout"
            case .grantAccess:
                return "/groups/" + AuthenticationRouter.GRP_KEY + "/membership"
            case .registerPatient:
                return "/vaults/" + RestRouter.VAULT_ID + "/documents"
        }
    }
    
    // MARK: URLRequestConvertible
    
    func asURLRequest() throws -> URLRequest {
        let url = try AuthenticationRouter.baseURLString.asURL()
        
        var urlRequest = URLRequest(url: url.appendingPathComponent(path))
        urlRequest.httpMethod = method.rawValue
        
        var params = [String: Any]()
        
        switch self {
            case .authenticate(let username, let password, let accountId):
                urlRequest.setValue(
                    "Basic " + AuthenticationRouter.API_KEY,
                    forHTTPHeaderField: "Authorization"
                )
                
                params = [
                    "username"   : username,
                    "password"   : password,
                    "account_id" : accountId ?? ""
                ]
            case .register(let username, let password, let attibutes):
                urlRequest.setValue(
                    "Basic " + AuthenticationRouter.API_KEY,
                    forHTTPHeaderField: "Authorization"
                )
                
                params = [
                    "username"  : username,
                    "password"  : password,
                    "attibutes" : attibutes ?? [:]
                ]
            case .auth():
                params = [:]
                let token = (AuthenticationManager.getAccessToken() ?? "") + ":"
                let base64Token = token.toBase64()
                
                urlRequest.setValue(
                    "Basic " + base64Token,
                    forHTTPHeaderField: "Authorization"
                )
            case .logout():
                params = [:]
                let token = (AuthenticationManager.getAccessToken() ?? "") + ":"
                let base64Token = token.toBase64()
            
                urlRequest.setValue(
                    "Basic " + base64Token,
                    forHTTPHeaderField: "Authorization"
                )
            case .grantAccess(let userId):
                urlRequest.setValue(
                    "Basic " + AuthenticationRouter.API_KEY,
                    forHTTPHeaderField: "Authorization"
                )
                params = ["user_ids" : [
                        userId
                    ]
                ]
                return try JSONEncoding.default.encode(urlRequest, with: params)
            case .registerPatient(let userId, let username, let fullName, let token):
                
                let token = (AuthenticationManager.getAccessToken() ?? "") + ":"
                let base64Token = token.toBase64()
                
                let document = String(format:"{\"user_id\":\"%@\",\"user_id\":\"%@\",\"full_name\":\"%@\",\"token\":\"%@\"}", userId, username, fullName ?? "", token)
                
                params = [
                    "document"  : document.toBase64(),
                    "schema_id" : RestRouter.PATIENT_ID
                ]
            
                urlRequest.httpMethod = method.rawValue
                urlRequest.setValue(
                    "Basic " + base64Token,
                    forHTTPHeaderField: "Authorization"
                )
        }
        
        urlRequest = try URLEncoding.default.encode(urlRequest, with: params)

        return urlRequest
    }
}
