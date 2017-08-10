//
//  NSObject+FactualWrapper.m
//  test
//
//  Created by Dimitris Bouzikas on 25/05/17.
//  Copyright © 2017 Dimitris Bouzikas. All rights reserved.
//

#import "FactualEngine-Bridging-Header.h"

@interface FactualWrapper () {
    FactualEngine *engine;
}

@end

@implementation FactualWrapper

- (instancetype)init {
    if (self) {
        engine = [FactualEngine sharedEngine];
    }
    
    return self;
}

- (void)registerApplication
{
    [engine startWithApiKey:@"fdCWwEBNv5b3ib4mTJkeJSWZ3Ui0xiTjSnYqOq7p"
             acceptedTosUrl:@"https://www.apple.com/legal/internet-services/itunes/us/terms.html"
            acceptedTosDate:[NSDate date]];
    
//    [engine genPlaceCandidatesWithDelegate:self];
    [self registerCircumstance];
}

- (void)registerCircumstance
{
    [engine
     registerCircumstanceNotifierWithId:@"test"
     expr:@"(at any-factual-place)"
     when:@"departing"
     delegate:self];
}

// ------ these belong to FactualCircumstanceDelegate ------
// a circumstance was met.
- (void)factualCircumstanceDidOccur: (FactualCircumstance *)circumstance {
    NSLog(@"error in circumstance: %@", circumstance);
}

// something went wrong
- (void)factualCircumstance: (FactualCircumstance *)circumstance didFailWithError:(NSError *)error {
    NSLog(@"error in circumstance: %@", error);
}

// some data was generated for debugging purposes.
- (void)factualCircumstance: (FactualCircumstance *)circumstance didReportDebugInfo:(id)debugInfo {
    NSLog(@"debugInfo: %@", debugInfo);
}

- (void)factualDataRequest:(FactualDataRequest *)request didFinishWithData:(id)data
{
    NSLog(@"Data: %@", data);
}

- (void)factualDataRequest:(FactualDataRequest *)request didFailWithError:(NSError *)error
{
    NSLog(@"Errpr: %@", error);
}

@end
