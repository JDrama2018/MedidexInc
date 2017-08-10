//
//  HealthTrackerTableViewCell.swift
//  Medidex
//
//  Created by Dimitris Bouzikas on 20/05/17.
//  Copyright © 2017 Medidex Inc. All rights reserved.
//

import UIKit
import ScrollableGraphView

class HealthOverviewDetailTableViewCell: UITableViewCell {

    @IBOutlet weak var indicationLabel: UILabel!
    @IBOutlet weak var indicationValue: UILabel!
    @IBOutlet weak var graphView: UIView!
    @IBOutlet weak var graphImageView: UIImageView!
    @IBOutlet weak var unit: UILabel!
    
    override func awakeFromNib() {
        super.awakeFromNib()
        // Initialization code
    }

    override func setSelected(_ selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)

        // Configure the view for the selected state
    }
    
    func setRow(_ healthData: HealthTracker) {
        indicationLabel.text = healthData.indication
        indicationValue.text = healthData.indicationValue
        graphImageView.image = healthData.graph
        unit.text = healthData.unit
    }

    func setRow(_ labObservation: LabObservation) {
        let v = labObservation.labValues?[0]
        
        indicationLabel.text = labObservation.labName
        indicationValue.text = String(format:"%.2f", v!)
        unit.text = labObservation.labUnits
        
        var labels = [String]()
        let dayFormatter = DateFormatter()
        dayFormatter.dateFormat = DateFormatter.dateFormat(fromTemplate: "HH:mm dd/MM", options: 0, locale: nil)
        
        for labDatetime in labObservation.labDatetimes! {
            let timeInterval = Double(labDatetime)
            let date = Date(timeIntervalSince1970: timeInterval)
            let day = dayFormatter.string(from: date)
            labels.append(day)
        }
        
        self.setGraph(labObservation.labValues!, labels)
    }
    
    func setGraph(_ data: [Double], _ labels: [String]) {
        let graphV = ScrollableGraphView(frame: self.graphView.frame)
        graphV.backgroundFillColor = UIColor.darkGray
        
        graphV.rangeMax = data.max()! + 2
        
        graphV.lineWidth = 1
        graphV.lineColor = UIColor.groupTableViewBackground
        graphV.lineStyle = ScrollableGraphViewLineStyle.smooth
        
        graphV.shouldFill = true
        graphV.fillType = ScrollableGraphViewFillType.gradient
        graphV.fillColor = UIColor.cyan
        graphV.fillGradientType = ScrollableGraphViewGradientType.linear
        graphV.fillGradientStartColor = UIColor.cyan
        graphV.fillGradientEndColor = UIColor.lightGray
        
        graphV.dataPointSpacing = 80
        graphV.dataPointSize = 2
        graphV.dataPointFillColor = UIColor.white
        
        graphV.referenceLineLabelFont = UIFont.boldSystemFont(ofSize: 8)
        graphV.referenceLineColor = UIColor.white.withAlphaComponent(0.2)
        graphV.referenceLineLabelColor = UIColor.white
        graphV.dataPointLabelColor = UIColor.white.withAlphaComponent(0.5)
        
//        let data: [Double] = [44, 130, 149, 139, 138, 141, 121]
//        let labels = ["", "", "", ""]
        
        graphV.set(data: data, withLabels: labels)
        self.addSubview(graphV)
    }
}
