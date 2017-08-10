//
//  Conversation.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 12/06/2017.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import Foundation

public typealias ConversationsResultBlock = (Error?, [String: Any]?) -> Void

class Conversation {
    
    // MARK: Class properties
    public typealias ConversationBlock = (Error?, Array<Conversation>?) -> Void
    
    var id: String?
    var senderId: String?
    var senderName: String?
    var senderToken: String?
    var receiverId: String?
    var receiverName: String?
    var latestMessage: String?
    var lastSentTimestamp: Int?
    
    // MARK: Class lifecycle
    
    init(_ object: Dictionary<String, Any>) {
        self.id = object["id"] as! String?
        self.senderId = object["sender_id"] as! String?
        self.senderName = object["sender_name"] as! String?
        self.senderToken = object["sender_token"] as! String?
        self.receiverId = object["receiver_id"] as! String?
        self.receiverName = object["receiver_name"] as! String?
        self.latestMessage = object["latest_message"] as! String?
        self.lastSentTimestamp = object["last_sent_timestamp"] as! Int?
    }
    
    static func newConversation(_ senderId: String,
                                _ senderName: String,
                                _ senderToken: String,
                                _ receiverId: String,
                                _ receiverName: String,
                                _ latestMessage: String,
                                _ lastSentTimestamp: Int,
                                completionBlock: ConversationsResultBlock? = nil
        ) {
        ApiManager.sharedInstance.newMessage() { (error: Error?, response: [String: Any]?) in
            if let conversationId = response?["document_id"] as! String? {
                ApiManager.sharedInstance.newConversation(conversationId, senderId, senderName, senderToken, receiverId, receiverName, latestMessage, lastSentTimestamp) { (error: Error?, response: [String: Any]?) in
                    completionBlock!(nil, ["conversation_id" : conversationId])
                }
            } else {
                completionBlock!(error, nil)
            }
        }
    }
    
    static func getAll(_ completionBlock: ConversationBlock? = nil) {
        ApiManager.sharedInstance.getConversations() { (error: Error?, response: [String: Any]?) in
            if let data = response?["data"] as! [String : Any]? {
                if let items = data["items"] as! Array<[String : Any]>? {
                    let slots = mapObjectWithConversations(items)
                    completionBlock!(error, slots)
                } else {
                    completionBlock!(error, [])
                }
            } else {
                completionBlock!(error, [])
            }
        }
    }
    
    static func mapObjectWithConversations(_ items: Array<[String : Any]>?) -> Array<Conversation> {
        var conversations : Array<Conversation> = []
        
        for item in items! {
            if let document = item["document"] as! String! {
                let documentStr = document.fromBase64()!
                if let jsonObject = documentStr.parseJSONString as! [String : Any]? {
                    let conversation = Conversation.init(jsonObject)
                    conversations.append(conversation)
                }
            }
        }
        
        return conversations
    }
}
