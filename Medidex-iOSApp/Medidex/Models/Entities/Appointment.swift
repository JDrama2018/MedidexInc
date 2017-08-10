//
//  Appointment.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 20/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import Foundation

public typealias AppointmentsResultBlock = (Error?, [String: Any]?) -> Void

class Appointment {
    
    // MARK: Class properties
    public typealias AppointmentsBlock = (Error?, Array<Appointment>?) -> Void
    
    var username: String
    var specialty: String?
    var description: String?
    var place: String?
    var timestamp: Int?
    
    
    // MARK: Class lifecycle
    
    init(_ object: Dictionary<String, Any>) {
        self.username = object["name"] as! String
        self.specialty = object["specialty"] as! String?
        self.description = object["description"] as! String?
        self.place = object["place"] as! String?
        self.timestamp = object["available_date"] as! Int?
    }
    
    static func newAppointment(_ description: String, _ specialty: String, _ place: String,
            _ timestamp: Int, completionHandler: AppointmentsResultBlock? = nil
        ) {
        ApiManager.sharedInstance.newAppointment(description, specialty, place, timestamp) {
            (error: Error?, response: [String: Any]?) in
                completionHandler!(error, response)
        }
    }
    
    static func getAppointments(_ completionBlock: AppointmentsBlock? = nil) {
        ApiManager.sharedInstance.getAppointments() { (error: Error?, response: [String: Any]?) in
            if let data = response?["data"] as! [String : Any]? {
                if let items = data["items"] as! Array<[String : Any]>? {
                    let slots = mapObjectWithAppointments(items)
                    completionBlock!(error, slots)
                } else {
                    completionBlock!(error, [])
                }
            } else {
                completionBlock!(error, [])
            }
        }
    }

    static func mapObjectWithAppointments(_ items: Array<[String : Any]>?) -> Array<Appointment> {
        var appointments : Array<Appointment> = []

        for item in items! {
            if let document = item["document"] as! String! {
                let documentStr = document.fromBase64()!
                if let jsonObject = documentStr.parseJSONString as! [String : Any]? {
                    let appointment = Appointment.init(jsonObject)
                    appointments.append(appointment)
                }
            }
        }

        return appointments
    }
}
