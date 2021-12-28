-- Update Credit Card Number for Patient#0000001
UPDATE Transactions
SET t_creditNum = '2222-8888-3333-5556' 
where t_patientID = 'Patient#0000001';

-- Update payment status to complete for transaction number 0000018
UPDATE Transactions
SET t_status = 'C' 
where t_transactionNum = '0000018';

-- correct all medicineID (Medicine#0003) name to proxymetacaine
UPDATE PatientHistory
SET ph_medicineName = 'proxymetacaine' 
where ph_medicineID = 'Medicine#0003';

-- Delete Employee#00010 
DELETE FROM Employee WHERE e_employeeID = 'Employee#00010';

-- Delete Patient#0000017
DELETE FROM Patient WHERE p_patientID = 'Patient#0000017';

-- Delete Patient#0000017
DELETE FROM PatientHistory WHERE ph_patientID = 'Patient#0000017';

-- Insert ONCOLOGY as a new Department with a new Department ID
INSERT INTO Department(dpt_dptName, dpt_employeeID,dpt_departmentID)  
VALUES ('ONCOLOGY',null,'Department#0005');

-- Insert a new patient with their corresponding information
INSERT INTO Patient(p_patientID, p_name, p_address, p_dateOfBirth, p_gender, p_SSN, p_number, p_email) 
VALUES ('Patient#0000021', 'Rasela Vailahi', '903 Vailele St, HI 96734', '1998-05-12', 'F', '608-65-1330', '760-928-9521', 'raselavailahi12@gmail.com');

-- Insert a new Employee and their position (Doctor, Nurse, Receptionist)
INSERT INTO Employee(e_employeeID, e_name, e_gender,e_jobTitle)  
VALUES ('Employee#000011', 'Lalelei Alofa', 'F', 'DOCTOR');

-- Insert new information about a patient into their corresponding patient history (medicine, surgery)
INSERT INTO PatientHistory(ph_patientID, ph_employeeID, ph_medicineID,ph_medicineName,ph_surgeryName, ph_comments)  
VALUES ('Patient#0000021', 'Employee#000011', 'Medicine#0365', 'avastin', 'Oophorectomy', null);

-- What are the names of Merideth Greys patients?
select p_name from Patient, Doctor where p_patientID=d_patientID and d_name='Dr. Merideth Grey';

-- How many male patients do each doctor have? 
select d_name,count(distinct p_patientID) from Patient, Doctor where d_patientID=p_patientID and p_gender='M' group by d_name;

-- What is the total price of Olivia Hawks' transactions?
select sum(t_total) as totalprice from Patient, Transactions where p_patientID=t_patientID and p_name='Olivia Hawks';

-- Which doctor has the most patients?
select d_name from Doctor,Patient where p_patientID=d_patientID group by d_name having count(distinct p_patientID)=(select Max(q1.patientcount) 
from (select d_name,count(distinct p_patientID)as patientcount from Patient, Doctor where p_patientID=d_patientID group by d_name)q1);

-- How many patients were prescribed hydrocodone-acetaminophen?
Select count (p_name) from Patient, PatientHistory 
where p_patientID = ph_patientID and ph_medicineName = 'hydrocodone-acetaminophen';

-- What are the names of female patients that had plastic surgery? 
select distinct p_name from Patient,Doctor where p_patientID=d_patientID and p_gender='F' and d_dptName='PLASTIC'; 

-- How many incomplete,complete, and processing payments are there? 
select t_status,count() from Patient, Transactions where p_patientID=t_patientID group by t_status; 

-- What are the names of different department are there?
Select distinct dpt_dptName from Department;

-- How many patients were born in the year of 2000?
Select count(distinct p_patientID) from Patient where p_dateOfBirth like '2000%';

-- What are the patient names of Dr. Merideth Grey that had an appendectomy? 
Select p_name from Patient, Doctor, PatientHistory where p_patientID = d_patientID and p_patientID = ph_patientID and
d_name = 'Dr. Merideth Grey' and ph_surgeryName = 'Appendectomy';


