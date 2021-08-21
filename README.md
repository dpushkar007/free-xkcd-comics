# <div align="center">Free XKCD Comics</div>

### Prerequisite
- Recent web browser
- Internet connection

## Link to the application
[FREE XKCD COMICS](http://free-xkcd-comic.herokuapp.com/)

## Description
<p align="justify">This is a Web application, developed using core php, HTML and CSS. One needs to subscribe to it using an email address, and after successfull subscription it will email xkcd comics at certain time intervals.</p>  

* ### Functionality of the application  
  1) <p align="justify">Subscription : By visiting url one has to submit an email address in the input field of subscription box. Upon submmitting system will check if email is already present in the database. If email is already there it will trigger warning that email is in the database; but if email is not present it will send an OTP to the specified email address for authentication, as well as a modal window will be opened on the same page to enter OTP. Upon entering the received OTP user will be subscribed to the comic mailing service and will be taken to Subscription confirmation page. And after that user will receive comics at certain time intervals via emails.</p>  
  2) <p align="justify">Unsubscription : Unsubscribing is almost same procedure as Subscribing. It can be done by either visiting Unsubscribe url or by visiting hyperlink present at the bottom of emails containing comics. On submitting email address on the Unsubscribe page it will check if email is presesnt in the database. If not present then it will trigger warning that Email does not exist in the records; and if present, then OTP will be sent to the specified email address address and at the same time modal window will be opened to enter the OTP. Upon entering the OTP unsubscribing action will be successfull, and it will send user to the confirmation page.</p>  
  3) <p align="justify">On the home page of the website, along with subscription box, it shows random XKCD comics, and comic will change every time page is refreshed.</p>

* ### Technologies Used in development
  1) <p align="justify">HTML/CSS : Core HTML and CSS are used to develope the frontend of the application, and basic styling and visuals of it.</p>  
  2) <p align="justify">javascript : Native javascript is used for couple of functions such as window refresh mechanism.</p>  
  3) <p align="justify">PHP : Core PHP used to develope the backend of the application. Entire functionality, along with api calls are developed using PHP with the help of json interface provided by XKCD comics website.  Inbuilt PHP functions are used to fetch the source headers of the comic url.  PHP extension MIME is used to implement HTML template for an email.</p>  
  4) Database : [freesqldatabase](https://www.freesqldatabase.com/) has provided Mysql database functionality for the applicaiton.  
  
  5) Mailing service : [SendinBlue](https://www.sendinblue.com/) has provided api for the mailing service, which is integrated using php.  
  
  6) Hosting : Website is hosted on [heroku](https://signup.heroku.com/login) platform.  

  7) Cron job : [EasyCron](https://www.easycron.com/user) is used to schedule automated emails i.e. cron job for comic schedulling via email. Once specifying the proper instruction in the scheduler functionality ot it, it will execute the job at given time with failure rate of 0.2%.
