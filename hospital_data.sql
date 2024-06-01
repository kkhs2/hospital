use hospital;

optimize table 


/*insert into wards (id, name, created_at, updated_at) values 
(null, 'Respiratory', now(), now()),
(null, 'Accident and Emergency', now(), now()),
(null, 'Endoscopy', now(), now()),
(null, 'Neonatal', now(), now()),
(null, 'Surgical', now(), now()),
(null, 'Paediatric', now(), now()),
(null, 'Maternity', now(), now()),
(null, 'Cardiology', now(), now()),
(null, 'Intensive Care Unit', now(), now())*/

 
/*insert into hospitals (id, name, address1, address2, towncity, county, postcode, created_at, updated_at) 
values
(null, 'Milton Keynes University Hospital', 'Standing Way', 'Eaglestone', 'Milton Keynes', 'Buckinghamshire', 'MK6 5LD', now(), now()),
(null, 'Luton and Dunstable University Hospital', 'Lewsey Road', '', 'Luton', 'Bedfordshire', 'LU4 0DZ', now(), now()),
(null, 'Northampton General Hospital NHS Trust', 'Cliftonville', '', 'Northampton', 'Northamptonshire', 'NN1 5BD', now(), now()),
(null, 'Manchester Royal Infirmary', 'Oxford Road', '', 'Manchester', 'Greater Manchester', 'M13 9WL', now(), now()),
(null, 'St George’s University Hospitals NHS Foundation Trust', 'Blackshaw Road', 'Tooting', 'London', 'Greater London', 'SW17 0QT', now(), now())
*/ 

/*insert into positions (id, job, created_at, updated_at) 
values (null, 'Healthcare Assistant', now(), now()),
(null, 'Junior Staff Nurse', now(), now()),
(null, 'Staff Nurse', now(), now()),
(null, 'Sister Nurse', now(), now()),
(null, 'Ward Manager', now(), now()),
(null, 'Junior Doctor', now(), now()),
(null, 'Doctor', now(), now()),
(null, 'Consultant', now(), now())

create table admins (
  id int not null auto_increment primary key,
  staff_id int,
  created timestamp default current_timestamp,
  updated datetime default current_timestamp on update current_timestamp
);




create table shifts (
  id int not null auto_increment primary key,
  name varchar(20),
  `date` date,
  created timestamp default current_timestamp,
  updated datetime default current_timestamp on update current_timestamp
);
*/