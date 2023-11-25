<?php
/*---------------------------------------------------------------------
    home routes
--------------------------------------------------------------------- */
route('home', 'Home@index');

route('home/signin', 'SignIn@index');
route('home/workerreg', 'worker/WorkerRegistration@index');


route('home/workerregnext', 'worker/WorkerRegNext@index');
route('home/workerregthree', 'worker/WorkerRegThree@index');
route('home/workerregfour', 'worker/WorkerRegFour@Index');
route('home/workerregfive', 'worker/WorkerRegFive@Index');
route('about', 'about/About@Index');

/*---------------------------------------------------------------------
    employee routes
--------------------------------------------------------------------- */

route('employer/home', 'employer/Emphome@index');
route('employer/addjob', 'employer/AddJob@index');
route('employer/message', 'employer/Message@index');
route('employer/services', 'employer/Services@index');
route('employer/workerprof', 'employer/Workerprofview@index');
route('employer/myjob', 'employer/Myjob@index');
route('employer/postedjobsrequest', 'employer/PostedjobsRequest@index');
route('employer/myworkerreq', 'employer/RequestByME@index');
route('employer/profile', 'employer/EmployerProfile@index');
route('employer/editprofile', 'employer/EditProfile@index');
route('employer/notifications', 'employer/EmpNotification@index');



/*---------------------------------------------------------------------
    worker routes
--------------------------------------------------------------------- */

route('worker/home', 'worker/WorkerHome@index');
route('worker/requestjob', 'worker/RequestJob@index');
route('worker/services', 'worker/WorkersList@index');
route('worker/viewworker', 'worker/ViewWorkers@index');
route('worker/messages', 'worker/Messages@index');
route('worker/myjobs', 'worker/Myjobs@index');
route('worker/recievedjobs', 'worker/RecievedJob@index');
route('worker/acceptedjobs', 'worker/AcceptedJobs@index');
route('worker/completedjobs', 'worker/CompletedJobs@index');
route('worker/workerprofile', 'worker/WorkerProfile@index');
route('worker/notifications', 'worker/WorkerNotification@index');

/*---------------------------------------------------------------------
    admin routes
--------------------------------------------------------------------- */

route('admin/home', 'admin/AdHome@index');
route('admin/workers', 'admin/WorkersList@index');
route('admin/employers', 'admin/EmployersList@index');
route('admin/admincrew', 'admin/AdminCrew@index');
route('admin/adnotification', 'admin/AdNotification@index');
route('admin/adnotification2', 'admin/AdNotification2@index');
route('admin/adreports', 'admin/AdReports@index');

/*---------------------------------------------------------------------
    worker routes
--------------------------------------------------------------------- */

route('member/home', 'member/AdHome@index');
route('member/workers', 'member/WorkersList@index');
route('member/tickets', 'member/Ticket@index');
