# WebDesignProject overview

Log in credentials for database 
1) Admin -> admin@gmail.com pass: missfortune123.
2) Tech Support -> TechSupport@yahoo.com pass: Password123.
3) Normal User -> john.doe@example.com pass: Password123.

Extentions used:
Chat Gpt if it counts,
JustValidate library 
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="clientSideValidation.js" defer></script>

  Jquery library
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

Ionicons for the small icon images 
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  Some notes:
  Since while testing you cannot check if emails are sent to an email address i left it as an inquirey and logged them in the database
  Sending emails could have easely been done by including <script src="https://smtpjs.com/v3/smtp.js"> 
  aA .htaccess has been set where we can be redirected to other pages without the need to know the file extention(.hmtl, .php) and also
  it wont show in the url.
  Images are stored in the database, used the blob type variable.

  This project includes almost all concepts learned in class
  Starting from header, links, iframes and up to ajax, database connection ect.
