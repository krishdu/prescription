ALTER TABLE  `prescribed_cf` ADD INDEX (  `clinical_impression_id` )

ALTER TABLE  `prescribed_investigation` ADD INDEX (  `PRESCRIBED_INVESTIGATION_ID` )
ALTER TABLE  `prescribed_investigation` ADD INDEX (  `PRESCRIPTION_ID` )
ALTER TABLE  `prescribed_investigation` ADD INDEX (  `INVESTIGATION_ID` )
ALTER TABLE  `patient_health_details_master` ADD INDEX (  `ID` )
ALTER TABLE  `patient_health_details` ADD INDEX (  `ID` )
ALTER TABLE  	allergy_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	clinical_impression	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	dose_details_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	dose_direction	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	dose_timing_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	investigation_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	lmp	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	medicine_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	past_medical_history_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	patient	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	patient_health_details	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	patient_health_details_by_receptionist	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	patient_health_details_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	patient_investigation	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	precribed_medicine	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	prescribed_allergy	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	prescribed_cf	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	prescribed_investigation	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	prescribed_past_med_history	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	prescribed_social_history	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	prescription	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	social_history_master	ADD INDEX (  `chamber_id`  ) ;
ALTER TABLE  	visit	ADD INDEX (  `chamber_id`  ) ;

ALTER TABLE  	allergy_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	clinical_impression	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	dose_details_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	dose_direction	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	dose_timing_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	investigation_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	lmp	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	medicine_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	past_medical_history_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	patient	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	patient_health_details	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	patient_health_details_by_receptionist	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	patient_health_details_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	patient_investigation	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	precribed_medicine	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	prescribed_allergy	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	prescribed_cf	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	prescribed_investigation	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	prescribed_past_med_history	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	prescribed_social_history	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	prescription	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	social_history_master	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  	visit	ADD INDEX (   `doc_id` ) ;
ALTER TABLE  `medicine_master` ADD INDEX (  `MEDICINE_ID` )


ALTER TABLE  `patient_investigation` ADD INDEX (  `investigation_id` )
