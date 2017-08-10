//
//  HospitalVisitViewController.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 20/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit

class HospitalVisitViewController: UIViewController, UIWebViewDelegate {

    var linkNum: Int = 0
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        var linkWebpage = ""
        var visitTitle = ""
        
        webview.delegate = self
        
        // ---- HOSPITAL part -----
        if linkNum == 0 {
            linkWebpage = "https://www.epowerdoc.com/"
            visitTitle = "HOSPITAL VISIT"
        }
        else if linkNum == 1 {
            linkWebpage = "https://www.jointcommission.org/accreditation/ambulatory_healthcare.aspx"
            visitTitle = "HOSPITAL VISIT"
        }
        else if linkNum == 2 {
            linkWebpage = "https://www.hopkinsmedicine.org/patient_care/pay_bill/insurance_footnotes.html"
            visitTitle = "HOSPITAL VISIT"
        }
        else if linkNum == 3 {
            linkWebpage = "http://www.r-lifeweekly.com/search/list/?lang=en"
            visitTitle = "HOSPITAL VISIT"
        }
        else if linkNum == 4 {
            linkWebpage = "http://www.rent-yokohama.com/kagukaden_en/bukken/"
            visitTitle = "HOSPITAL VISIT"
        }
            
            // ---- PRIMARY CARE part -----
        else if linkNum == 5 {
            linkWebpage = "https://www.healthcareers.nhs.uk/explore-roles/general-practice-gp"
            visitTitle = "PROMARY CARE VISIT"
        }
        else if linkNum == 6 {
            linkWebpage = "http://bcog.com/"
            visitTitle = "PROMARY CARE VISIT"
        }
        else if linkNum == 7 {
            linkWebpage = "http://prospective.westernu.edu/nursing-fnp/welcome-8/?gclid=COPlwO2BmtMCFcGUvQodfs8Plg"
            visitTitle = "PROMARY CARE VISIT"
        }
        else if linkNum == 8 {
            linkWebpage = "https://www.allphysicianjobs.com/landing/?utm_source=adwords&utm_medium=cpc&utm_campaign=locum_core&utm_term=physicians%20assistant"
            visitTitle = "PROMARY CARE VISIT"
        }
            
            // ---- NURSING CARE part -----
        else if linkNum == 9 {
            linkWebpage = "https://csupalliativecare.org/programs/rncertificate/"
            visitTitle = "NURSING CARE VISIT"
        }
        else if linkNum == 10 {
            linkWebpage = "https://www.bls.gov/ooh/healthcare/licensed-practical-and-licensed-vocational-nurses.htm#tab-2"
            visitTitle = "NURSING CARE VISIT"
        }
        else if linkNum == 11 {
            linkWebpage = "http://prospective.westernu.edu/nursing-fnp/welcome-8/?gclid=CMrfoquDmtMCFUIHvAodmB0HIA"
            visitTitle = "NURSING CARE VISIT"
        }
        else if linkNum == 12 {
            linkWebpage = "https://explorehealthcareers.org/career/nursing/clinical-nurse-specialist/"
            visitTitle = "NURSING CARE VISIT"
        }
        else if linkNum == 13 {
            linkWebpage = "http://www.midwife.org/"
            visitTitle = "NURSING CARE VISIT"
        }
        else if linkNum == 14 {
            linkWebpage = "http://www.aana.com/Pages/default.aspx"
            visitTitle = "NURSING CARE VISIT"
        }
            
            // ---- DRUG THERAPLY part -----
        else if linkNum == 15 {
            linkWebpage = "https://www.uspharmacist.com/"
            visitTitle = "DRUG THERAPLY VISIT"
        }
            
            // ---- SPECIALTY CARE part -----
        else if linkNum == 16 {
            linkWebpage = "http://www.allergyasthmanetwork.org/patients/?gclid=CIGR9YCHmtMCFQ1xvAodZwQKSg"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 17 {
            linkWebpage = "http://www.google.com/"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 18 {
            linkWebpage = "http://www.medicine.northwestern.edu/divisions/cardiology/"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 19 {
            linkWebpage = "http://med.stanford.edu/dermatology.html"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 20 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 21 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 22 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 23 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 24 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 25 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 26 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 27 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 28 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
        }
        else if linkNum == 29 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 30 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 31 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 32 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 33 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 34 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 35 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 36 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 37 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
        else if linkNum == 38 {
            linkWebpage = "https://www.floridahospital.com/wound-care-hyperbaric-medicine"
            visitTitle = "SPECIALTY CARE VISIT"
        }
            
            // ---- IMAGING/DIAGNOSTICS part -----
        else if linkNum == 39 {
            linkWebpage = "https://www.oncologysystems.com/diagnostic-imaging/mri-systems/toshiba-mri-parts/?gclid=CLrknJKImtMCFYGZvAodaTIP3g"
            visitTitle = "MAGING/DIAGNOSTICS VISIT"
        }
        else if linkNum == 40 {
            linkWebpage = "https://www.radiologyinfo.org/en/info.cfm?pg=bodyct"
            visitTitle = "MAGING/DIAGNOSTICS VISIT"
        }
        else if linkNum == 41 {
            linkWebpage = "http://xraymedicalservices.com/"
            visitTitle = "MAGING/DIAGNOSTICS VISIT"
        }
        else if linkNum == 42 {
            linkWebpage = "http://www.mbfbioscience.com/stereo-investigator/?gclid=CIjB3IaLmtMCFYZjvAoda88FXA"
            visitTitle = "MAGING/DIAGNOSTICS VISIT"
        }
        else if linkNum == 43 {
            linkWebpage = "https://www.ama-assn.org/content/genetic-testing"
            visitTitle = "MAGING/DIAGNOSTICS VISIT"
        }
        self.navigationItem.title = visitTitle
        
        let url = NSURL (string: linkWebpage);
        let requestObj = NSURLRequest(url: url! as URL);
        webview.loadRequest(requestObj as URLRequest);
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    @IBOutlet weak var webview: UIWebView!
    
    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepare(for segue: UIStoryboardSegue, sender: Any? {
        // Get the new view controller using segue.destinationViewController.
        // Pass the selected object to the new view controller.
    }
    */

}
