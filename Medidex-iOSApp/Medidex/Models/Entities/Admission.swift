//
//  Admission.swift
//  Medidex
//
//  Created by Dimitrios Bouzikas on 22/06/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import Foundation

public typealias AdmissionsResultBlock = (Error?, [String: Any]?) -> Void

class Admission {
	
	// MARK: Class properties
	public typealias AdmissionsBlock = (Error?, Array<Admission>?) -> Void
	
	var id: Int?
	var documentId: String?
	var patientId: String?
	var code: String?
	var diagnosisDescription: String?
	var startDate: Int?
	var endDate: Int?
	
	// MARK: Class lifecycle
	
	init(_ object: [String: Any]) {
		self.id = object["id"] as! Int?
		self.documentId = object["document_id"] as! String?
		self.patientId = object["patient_id"] as! String?
		self.code = object["code"] as! String?
		self.diagnosisDescription = object["description"] as! String?
		self.startDate = object["start_date"] as! Int?
		self.endDate = object["end_date"] as! Int?
	}
	
	static func getAdmissions(_ completionBlock: AdmissionsBlock? = nil) {
		ApiManager.sharedInstance.getAdmissions() { (error: Error?, response: [String: Any]?) in
			if let data = response?["data"] as! [String : Any]? {
				if let items = data["items"] as! Array<[String : Any]>? {
					let admissions = mapObjectWithAdmissions(items)
					completionBlock!(error, admissions)
				} else {
					completionBlock!(error, nil)
				}
			} else {
				completionBlock!(error, nil)
			}
		}
	}
	
	static func mapObjectWithAdmissions(_ items: Array<[String : Any]>?) -> Array<Admission> {
		var admissions : Array<Admission> = []
		
		for item in items! {
			if let document = item["document"] as! String! {
				let documentStr = document.fromBase64()!
				if let jsonObject = documentStr.parseJSONString as! [String : Any]? {
					let admission = Admission.init(jsonObject)
					admissions.append(admission)
				}
			}
		}
		
		return admissions
	}
}
