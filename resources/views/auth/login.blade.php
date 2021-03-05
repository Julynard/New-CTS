<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>
<style>

</style>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
          <div class="card login-card">
            <div class="row no-gutters">
              <div class="col-md-5">
                {{-- <img src="{{ asset('login.jpg') }}" alt="login" class="login-card-img"> --}}
                <img src="https://dasma.pcu.edu.ph/wp-content/uploads/2019/01/pcudasma-1-1024x496.jpg" alt="login" class="login-card-img">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                    <center>
                        <div>
                            <img src="https://manila.pcu.edu.ph/wp-content/uploads/2018/05/pcu_logo_final_feb_2017.png" alt="logo" width="100">
                        </div>
                    </center>
                  <p class="login-card-description text-center">Sign into your account</p>
                  <center>
                    <form action="{{ route('auth.check') }}" method="POST">
                        @csrf
                        <div class="results">
                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="email" class="sr-only">Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}">
                          <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                          </span>
                        </div>
                        <div class="form-group mb-4">
                          <label for="password" class="sr-only">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                          <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                          </span>
                        </div>
                        <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                    </form>
                    <a href="#!" class="forgot-password-link">Forgot password?</a>
                    <p class="login-card-footer-text">Don't have an account? <a href="{{ route('adm.register') }}" class="text-reset">Register here</a></p>
                    <nav class="login-card-footer-nav">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Privacy policy & Terms of use.</button>
                    </nav>
                  </center>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg" style="width: 10000px">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Privacy policy & Terms of use.</h4>
                        </div>
                        <div class="modal-body">
                          <pre>
                           
<h1>Privacy Policy Statement</h1>
<b>Philippine Christian University,</b> a distinctively strong Christian university integrating faith, character and 
service gives significance to its mandate in compliance with the requirements under <b>RA 10173</b> known as the Data Privacy Act of 2012 the value of every individual’s right to privacy and 
safeguarding confidentially personal information obtained, and is committed to secure all documents responsibly. 
It defines what information will be collected or gathered and the details on how collected information be protected without incurring violation of individual’s personal privacy.

This Privacy Policy statement simplifies how personal information of data subjects whose personal, sensitive or privileged information are being obtained, stored, used, shared, processed, generated, 
protected and/ or withheld in custody by the university. And, it is in general in scope and applies to all service units of the university unless amended when needed.

Classification of Personal Information
Under Data Privacy Act (DPA) of 2012, defines the following:

1. Personal information refers to any information whether recorded in a material form or
not, from which the identity of an individual is apparent or can be reasonably and
directly ascertained by the entity holding the information, or when put together with
other information would directly and certainly identify an individual.

2. Sensitive personal information refers to personal information:
(1) Of an individual’s race, ethnic origin, marital status, age, color, and religious,
philosophical or political affiliations;

(2) Of an individual’s health, education, genetic or sexual life of a person, or to any
proceeding for any offense committed or alleged to have been committed by such

person, the disposal of such proceedings, or the sentence of any court in such
proceedings;

(3) Issued by government agencies peculiar to an individual which includes, but not
limited to, social security numbers, previous or current health records, licenses or
its denials, suspension or revocation, and tax returns; and

(4) Specifically established by an executive order or an act of Congress to be kept
classified.

University Storage of Personal Information
To effect the collection, the university adheres to the confidentiality and sensitivity of the data
thereby explains how personal information are accumulated.

A. Information we gather
PCU gathers the following information only as indicated through the following:

Personal Information, as follows, to wit : name, residential address, email address,  telephone number, mobile number, date of birth, passport details (for foreign nationals). 
The university will also issue applicant/student identification number once he/she is officially enrolled 
/registered in the University;
Education background and/or employment portfolio: to include school(s)and/or universities enrolled or concluded, programs and course completed, date(s) of completion, 
and the institution(s) where it was completed and employment as well.
Family or personal dealings, and academic and other extracurricular interests for assessment purpose, to avail scholarships/student financial aids/assistance;
Sensitive personal information to include such as : marital status, age, race, education religious and political affiliations, sexual preferences or practices, criminal record, 
health /medical history or memberships details, religious or philosophical beliefs 
and ethnicity, social security number (SSS for private worker), government service insurance system number (GSIS for government worker)/ , licenses or its denials, suspension or revocation, and tax returns.
Websites other than PCU websites are not kept by the university except IP address and System log files, but allows the university to create and host sites or pages (e.g. any social media platform).

PCU computers serves to allow us to log and information collected from the
 system consists only of the following:

a. Internet Address (IP number) of the website from which you linked
b. Name of the Internet domain from which you access the internet
c. Date and time (you visited PCU website)

B. How to collect
By the information provided by the learner in expressing his interest in studying in the
university;
By enrolling and completes application form/enrolment form and comply school admission requirements and policy. However when enrolled, the university may also
extract/collect additional information about the learner ( data subject), his/her academic or curricular undertakings, or any disciplinary action that the learner may be
involved in to include accompanying sanctions, or acquire other forms of data like pictures or videos of activities that the learner participated in through official
documentation of activities installed within school premises. But if, unsolicited information, even without prior request, 
the university will determine if to keep such information for the university  legitimate interests otherwise we will dispose such data collected or 
processed to protect or safeguard learner’s privacy.
Queries or communicating with the university via electronic email, and other various social media platforms; and
From previous school/s, university or employers who may provide references on the learner’s identity.
C. Sources of collected information gathered
From the following, namely:
<ul>
<li>prospective and current students</li>
<li>exchange/foreign students</li>
<li>visiting/adjunct and exchange professors</li>
<li>applicants</li>
<li>employees</li>
<li>alumni</li>
<li>donors (individual/company)</li>
<li>researchers</li>
<li>industry partners</li>
<li>university contractors, suppliers, concessionaires</li>
<li>university linkages, consortium and immersion</li>
<li>civic or religious organization</li>
</ul>
other members who may have transactions with the university
D. Usage of Data Subject Information
Personal and sensitive personal information are to be used for the following such as:
For educational support: admission, enrolment, assessment/testing, learning activities,
graduation, student services such as counselling, library use, medical examination;
For research: data analysis and experiments;
For community extension: linkages, immersion, consortium and industry affiliations, 
alumni activities, industry partnerships, website operation, event invitations and community forum;
For employment: recruitment, payroll processing, human resource programs and procurement activities, 
and annual physical examination;
For operational management: processing fees, data analysis, financial matters, IT, legal and professional 
services, educational opportunities,
 CCTV monitoring, access to systems for security and safety or emergency response;
For non-academic matters: student concerns, parking within the campus, dealing with grievances 
and disciplinary actions and other services catered relative to school operations; and
For other primary purpose or as authorized by law .
E. To whom we share your information
Under the Data Privacy Principles, Rule IV of Data Privacy Act of 2012, the university may
share your personal data with any person acting in your behalf or certain third parties or
personnel in adherence to the principles of transparency and legitimate purposes and
proportionality and with prior consent freely/voluntarily given by the data subject with
adequate safeguards in place.

F. To store and protect your information
The university takes appropriate security and safety measures to safeguard personal privacy
confidentiality of any personal information and other data from, loss, damage, process, and
unauthorized collection/disclosure, access or use by:

Storing information in accordance with the ICT Policy of the University which
determines when information should be retained or properly disposed when no longer
needed unless applicable law requires disposal after the expiration of retention period.
Personal information may be disposed upon valid request in the manner appropriate to
preserve and ensure the confidentiality, sensitivity and criticality of said information. 
Information collected and data generated are not to be shared with any other party unless disclosure 
is reasonably necessary with prior knowledge 
and written consent from the data subject and/or through judicial notice.
G. Retention of Data Quality information
The university takes cognizance in the encryption of personal data and in the collecting or
retaining data to ensure that the personal data collected and processed are reliable and
accurate for its intended use.

Rights of the Data Subject
In accordance with Data Privacy Act of 2012 (RA 10173) and its implementing Rules and
Regulations, the Data Subject is accorded the following rights:

Right to be informed
Data subject has the right to be informed whether personal information pertaining to him or
her shall be, are being or have been processed.
Data subject has the right to be notified and furnished with the information before the entry of
his or her personal data into the processing system of the personal information controller, to
include the following:

Description, purpose, basis of processing, scope and method of personal data to be entered into the system, 
recipients to whom personal data are to be disclosed,
methods utilized for automated access and the extent to which such access is authorized.
Right to Object
Data subject has the right to object to the processing of his or her personal data or withholds
consent except when such data is being processed as required by law.
Right to Access
Data subject has the right to reasonable access upon demand, the following:
a. contents of his or personal data processed;
b. sources from which personal data were obtained;
c. name and addresses of recipients;
d. manner by which data were processed;
e. reasons for disclosure of personal data to recipient, if any;
f. Information on automated processes where data will be made;
g. obtain a copy of data undergoing processing hard/printed copies as electronic form;
h. request in writing purposely to share personal information gathered with any person acting in behalf of the data subject.

Right To Access
Data subject has the right to reasonable access upon demand, the following:

a. contents of his or personal data processed;
b. sources from which personal data were obtained;
c. name and addresses of recipients;
d. manner by which data were processed;
e. reasons for disclosure of personal data to recipient, if any;
f. Information on automated processes where data will be made;
g. obtain a copy of data undergoing processing hard/printed copies as electronic form;
h. request in writing purposely to share personal information gathered with any person acting in behalf of the data subject;

Right to Rectify, Request, Restrict
Data subject has the right to dispute the inaccuracy or error in the personal data and have the
personal information controller rectify said data immediately and accordingly, unless the
request is vexatious or otherwise unreasonable.
Data subject has the right to suspend, withdraw or order the blocking, removal or destruction
of his or her personal data upon discovery and substantial proof of any of the following:
If incomplete, outdated, false or unlawfully obtained

Unauthorized purpose
Data collected no longer necessary for the purpose
 Withdraws consent or objects to the processing
It concerns private information that would prejudice the data subject
Unlawful processing
Rights have been violated
Right to Damages
Data subject shall be indemnified for any damages incurred due to: inaccurate, incomplete, outdated, 
false, unlawfully obtained or unauthorized use of personal data taking into account
any violation of his or her rights and freedom as data subject; and

Right to Sue
The right to file a complaint before the National Privacy Commission

Other Data Subject’s Personal Information
If providing personal information regarding other individuals or data subjects, the data subject
concern shall be informed and consent freely given either in writing or electronic form for the
collection, use, disclosure, and transfer of data subject personal information in accordance with
RA 10173. However, if information to be collected is that of a minor, prior consent from the
parent or legal guardian shall be obtained.

Concerns, Questions or Complaints

If you have any concern or query in the above-mentioned regarding data privacy policy, you
may contact our Data Protection Officer at :

Email: francischristie.arnado@pcu.edu.ph
Tel. No.: 89258959

Francis Christie C. Arnado, Ph.D.
Data Protection Officer
                          </pre>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
</body>
</html>