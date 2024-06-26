<?php
/*---------------------------------------------------------------------
    home routes
--------------------------------------------------------------------- */
route('home', 'Home@index');
route('home/payment', 'Payment@index');
route('home/verifyloginuser', 'VerifyLogin@index');

route('home/signin', 'SignIn@index');
route('home/signinverify', 'SignVerify@index');
route('home/forgetpwd', 'ForgotPwd@index');
route('home/resetpasswrd', 'ResetPwd@index');
route('home/signin2', 'SignIn2@index');
route('home/signout', 'SignOut@index');
route('home/workerreg', 'worker/WorkerRegistration@index');
route('home/workerreg2', 'worker/WorkerRegistration2@index');
route('verifyprompt', 'VerifyPrompt@index');
route('verify-email', 'VerifyEmail@index');


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
// edited by siraj for the employer dashboard
route('employer/dashboard', 'employer/Dashboard@index');

route('employer/myjob', 'employer/Myjob@index');
route('employer/paynotify', 'employer/PayNotifyOne@index');
route('employer/postedjobsrequest', 'employer/PostedjobsRequest@index');
route('employer/myworkerreq', 'employer/RequestByME@index');
route('employer/profile', 'employer/EmployerProfile@index');
route('employer/editprofile', 'employer/EditProfile@index');
route('employer/notifications', 'employer/EmpNotification@index');
route('employer/tickets', 'employer/Tickets@index');
route('employer/acceptedreq', 'employer/AcceptedRequest@index');
route('employer/viewjob', 'employer/ViewJob@index');
route('employer/reviewreq', 'employer/ReviewRequest@index');
route('employer/verifyemp', 'employer/VerifyEmployer@index');


// AJAX
route('employer/view_request', 'employer/RequestByME@viewRequest');
route('employer/count_request', 'employer/Myjob@countRequest');

// AJAX
route('employer/view_request', 'employer/RequestByME@viewRequest');
route('employer/count_request', 'employer/Myjob@countRequest');

route('employer/paymentgate', 'employer/AcceptedRequest@paymentConfig');
route('employer/paidstatus', 'employer/AcceptedRequest@updatePayStatus');
route('employer/markascompleted', 'employer/ReviewRequest@markAsCompleted');
route('employer/ratingsreviews', 'employer/ReviewRequest@handleRating');
route('employer/fetchratingsreviews', 'employer/ReviewRequest@fetchRating');

route('employer/fetchworkerratingsreviews', 'employer/Workerprofview@fetchWorkerRating');
route('employer/notifycount', 'employer/EmpNotification@wJobNotify');
route('employer/notifyupdate', 'employer/EmpNotification@wJobNotifyUpdate');


route('employer/notifycount', 'employer/EmpNotification@wJobNotify');
route('employer/notifyupdate', 'employer/EmpNotification@wJobNotifyUpdate');
route('employer/chatbox', 'employer/ReviewRequest@chat_data');
route('employer/saveMsg', 'employer/ReviewRequest@save_data');
route('employer/fetchrating', 'employer/ViewJob@fetchEmpRating');
route('employer/timestatus', 'employer/PostedjobsRequest@fetchTime');
/*---------------------------------------------------------------------
    worker routes
--------------------------------------------------------------------- */

route('worker/home', 'worker/WorkerHome@index');
route('worker/requestjob', 'worker/RequestJob@index');
route('worker/services', 'worker/WorkersList@index');
route('worker/viewworker', 'worker/ViewWorkers@index');
route('worker/messages', 'worker/Messages@index');
route('worker/myjobs', 'worker/Myjobs@index');
route('worker/tickets', 'worker/tickets@index');
route('worker/recievedjobs', 'worker/RecievedJob@index');
route('worker/acceptedjobs', 'worker/AcceptedworkerJobs@index');
route('worker/completedjobs', 'worker/CompletedJobs@index');
route('worker/workerprofile', 'worker/WorkerProfile@index');
route('worker/notifications', 'worker/WorkerNotification@index');
route('worker/editprofile', 'worker/EditProfile@index');
route('worker/verifyworker', 'worker/VerifyWorker@index');

route('worker/ongoingjobs', 'worker/OngoingJobs@index');

route('worker/viewjobmap', 'worker/ViewMap@index');
route('worker/viewemprofile', 'worker/ViewEmployerProfile@index');
// AJAX
route('worker/workerprofilerating', 'worker/WorkerProfile@WorkerProfileRating');
route('worker/workerrequestjob', 'worker/RequestJob@insertRequest');
route('worker/notifyjobcount', 'worker/WorkerNotification@eJobNotify');
route('worker/fetchlocations', 'worker/ViewMap@SendLocations');
/*---------------------------------------------------------------------
    admin routes
--------------------------------------------------------------------- */

route('admin/home', 'admin/AdHome@index');
route('admin/jobs', 'admin/Jobs@index');
route('admin/workers', 'admin/WorkersList@index');
route('admin/workers2', 'admin/WorkersList2@index');
route('admin/employers', 'admin/EmployersList@index');
route('admin/employeracc', 'admin/EmployerAcc@index');
route('admin/admincrew', 'admin/AdminCrew@index');
route('admin/adnotification', 'admin/AdNotification@index');
route('admin/adnotification2', 'admin/AdNotification2@index');
route('admin/adreports', 'admin/AdReports@index');
route('admin/workerprof', 'admin/WorkerProf@index');
route('admin/message', 'admin/Message@index');
route('admin/emprequests', 'admin/EmpRequests@index');
route('admin/workrequests', 'admin/WorkRequests@index');
route('admin/accrequests', 'admin/AccRequests@index');
route('admin/bargains', 'admin/Bargains@index');
route('admin/viewjob', 'admin/ViewJob@index');
route('admin/editemployeracc', 'admin/EditEmployerAcc@index');
route('admin/editworkerprof', 'admin/EditWorkerProf@index');


route('admin/fetchworkerratingsreviews', 'admin/WorkerProf@fetchWorkerRating');
route('admin/fetchratingsreviews', 'admin/EmployerAcc@fetchRating');

route('admin/workchatbox', 'admin/WorkersList2@chat_data');
route('admin/worksaveMsg', 'admin/WorkersList2@save_data');

route('admin/crewchatbox', 'admin/AdminCrew@chat_data');
route('admin/crewsaveMsg', 'admin/AdminCrew@save_data');

/*---------------------------------------------------------------------
    member routes
--------------------------------------------------------------------- */
route('crewMember/home', 'crewMember/crewHome@index');
route('member/home', 'Member/Home@index');
route('member/workerslist', 'member/WorkersList@index');
route('member/tickets', 'member/Tickets@index');
route('member/ticket', 'member/MemTicket@index');
route('member/workers', 'member/WorkersList@index');
route('member/verification', 'member/Verification@index');
route('member/verification2', 'member/Verification2@index');
route('member/employers', 'member/EmployersList@index');
route('member/employeracc', 'member/EmployerAcc@index');
route('member/account', 'member/Account@index');
route('member/contactus', 'member/ContactQuery@index');
route('member/mailsent', 'member/ContactQuery@sendingMail');




route('member/fetchworkerratingsreviews', 'member/Verification2@fetchWorkerRating');
route('member/fetchratingsreviews', 'member/EmployerAcc@fetchRating');
