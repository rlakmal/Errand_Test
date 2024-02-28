<html>
<head>
  <meta charset="utf-8">
  <title>Stackfindover: Sign in</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        color: #1a1f36;
        box-sizing: border-box;
        word-wrap: break-word;
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;
      }
      body {
          min-height: 100%;
          background-color: #ffffff;
      }
      h1 {
          letter-spacing: -1px;
      }
      a {
        color: #5469d4;
        text-decoration: unset;
      }
      .login-root {
          background: #fff;
          display: flex;
          width: 100%;
          min-height: 100vh;
          overflow: hidden;
      }
      .loginbackground {
          min-height: 692px;
          position: fixed;
          bottom: 0;
          left: 0;
          right: 0;
          top: 0;
          z-index: 0;
          overflow: hidden;
      }
      .flex-flex {
          display: flex;
      }
      .align-center {
        align-items: center; 
      }
      .center-center {
        align-items: center;
        justify-content: center;
      }
      .box-root {
          box-sizing: border-box;
      }
      .flex-direction--column {
          -ms-flex-direction: column;
          flex-direction: column;
      }
      .loginbackground-gridContainer {
          display: -ms-grid;
          display: grid;
          -ms-grid-columns: [start] 1fr [left-gutter] (86.6px)[16] [left-gutter] 1fr [end];
          grid-template-columns: [start] 1fr [left-gutter] repeat(16,86.6px) [left-gutter] 1fr [end];
          -ms-grid-rows: [top] 1fr [top-gutter] (64px)[8] [bottom-gutter] 1fr [bottom];
          grid-template-rows: [top] 1fr [top-gutter] repeat(8,64px) [bottom-gutter] 1fr [bottom];
          justify-content: center;
          margin: 0 -2%;
          transform: rotate(-12deg) skew(-12deg);
      }
      .box-divider--light-all-2 {
          box-shadow: inset 0 0 0 2px #e3e8ee;
      }
      .box-background--blue {
          background-color: #5469d4;
      }
      .box-background--white {
        background-color: #ffffff; 
      }
      .box-background--blue800 {
          background-color: #212d63;
      }
      .box-background--gray100 {
          background-color: #e3e8ee;
      }
      .box-background--cyan200 {
          background-color: #7fd3ed;
      }
      .padding-top--64 {
        padding-top: 64px;
      }
      .padding-top--24 {
        padding-top: 24px;
      }
      .padding-top--48 {
        padding-top: 48px;
      }
      .padding-bottom--24 {
        padding-bottom: 24px;
      }
      .padding-horizontal--48 {
        padding: 48px;
      }
      .padding-bottom--15 {
        padding-bottom: 15px;
      }
      
      
      .flex-justifyContent--center {
        -ms-flex-pack: center;
        justify-content: center;
      }
      
      .formbg {
          margin: 0px auto;
          width: 100%;
          max-width: 448px;
          background: white;
          border-radius: 4px;
          box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
      }
      span {
          display: block;
          font-size: 20px;
          line-height: 28px;
          color: #1a1f36;
      }
      label {
          margin-bottom: 10px;
      }
      .reset-pass a,label {
          font-size: 14px;
          font-weight: 600;
          display: block;
      }
      .reset-pass > a {
          text-align: right;
          margin-bottom: 10px;
      }
      .grid--50-50 {
          display: grid;
          grid-template-columns: 50% 50%;
          align-items: center;
      }
      
      .field input {
          font-size: 16px;
          line-height: 28px;
          padding: 8px 16px;
          width: 100%;
          min-height: 44px;
          border: unset;
          border-radius: 4px;
          outline-color: rgba(232, 147, 0, 0.801);
          background-color: rgb(255, 255, 255);
          box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px;
      }
      
      input[type="submit"] {
          background-color: rgb(196, 113, 18);
          box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                      rgb(230, 162, 3) 0px 0px 0px 1px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                      rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
          color: #d3b015;
          font-weight: 600;
          cursor: pointer;
      }
      .field-checkbox input {
          width: 20px;
          height: 15px;
          margin-right: 5px; 
          box-shadow: unset;
          min-height: unset;
      }
      .field-checkbox label {
          display: flex;
          align-items: center;
          margin: 0;
      }
      a.ssolink {
          display: block;
          text-align: center;
          font-weight: 600;
      }
      .footer-link span {
          font-size: 14px;
          text-align: center;
      }
      .listing a {
          color: #697386;
          font-weight: 600;
          margin: 0 10px;
      }
      
      .animationRightLeft {
        animation: animationRightLeft 2s ease-in-out infinite;
      }
      .animationLeftRight {
        animation: animationLeftRight 2s ease-in-out infinite;
      }
      .tans3s {
        animation: animationLeftRight 3s ease-in-out infinite;
      }
      .tans4s {
        animation: animationLeftRight 4s ease-in-out infinite;
      }
      
      @keyframes animationLeftRight {
        0% {
          transform: translateX(0px);
        }
        50% {
          transform: translateX(1000px);
        }
        100% {
          transform: translateX(0px);
        }
      } 
      
      @keyframes animationRightLeft {
        0% {
          transform: translateX(0px);
        }
        50% {
          transform: translateX(-1000px);
        }
        100% {
          transform: translateX(0px);
        }
      } 
      form .stugender-details .gender-title {
  font-size: 22px;
  display: flex;
  width: 15%;
  float: left;
  font-weight: ;
  margin-right: 10px;
  /* background: red; */
}
form .stugender-details .gender{
    font-size: medium;
}

form .stugender-details .category {
  display: flex;
  width: 30%;
  justify-content: space-between;
  margin: 5px 0;
  margin-right: 5px;

  /* background: red; */
}

.stugender-details .category label {
  display: flex;
  align-items: center;
  margin-right: 1%;
}
form .stugender-details .category .dot {
  height: 18px;
  width: 18px;
  background: #d9d9d9;
  border-radius: 50%;
  margin-right: 10px;
  border: 5px solid transparent;
  transition: all 0.3s ease-in;
}

#dot-1:checked ~ .category label .one,
#dot-2:checked ~ .category label .two {
  border-color: #d9d9d9;
  background: #373538;
}

form .stugender-details .category {
    display: flex;
    width: 30%;
    justify-content: space-between;
    margin: 5px 0;
    margin-right: 5px;
  
    /* background: red; */
  }
  
  .stugender-details .category label {
    display: flex;
    align-items: center;
    margin-right: 1%;
  }
  form .stugender-details .category .dot {
    height: 18px;
    width: 18px;
    background: #d9d9d9;
    border-radius: 50%;
    margin-right: 10px;
    border: 5px solid transparent;
    transition: all 0.3s ease-in;
  }
  
  #dot-1:checked ~ .category label .one,
  #dot-2:checked ~ .category label .two {
    border-color: #d9d9d9;
    background: #373538;
  }
  
  form input[type="radio"] {
    display: none;
  }

  .button {
    display: inline-flex;
   margin-left: 35%;
   margin-bottom: 10%;
  }
  
  .button input[type="submit"] {
    background-color: #ff8c00; /* Orange color */
    color: #fff; /* Text color */
    border: none;
    padding: 10px 20px;
    font-size: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 0 10px rgba(255, 140, 0, 0.8); /* Glowing effect */
  }
  
  .button input[type="submit"]:hover {
    background-color: #ffaa00; /* Lighter shade of orange on hover */
    box-shadow: 0 0 20px rgba(255, 170, 0, 0.8); /* Increase glow on hover */
  }
  
  
</style>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Register as Worker</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>
              <form method="POST">
                <div>
                  <h3>
            
                    Personal Information
                  </h3><br>
                </div>
                <div class="field padding-bottom--24">
                  <div class="input-box">
                    <span class="details">Full Name</span>
                    <input name="name" type="text" placeholder="Your Full Name" required />
                  </div>
            <br>
            
                  <div class="field padding-bottom--24">
                    <span class="details">NIC Number</span>
                    <input name="nic" type="text" placeholder="Your NIC Number" required />
                  </div><br>
            
                  <div class="field padding-bottom--24">
                    <span class="details">Address</span>
                    <input name="address" type="text" placeholder="Your Address" required />
                  </div>
            
                  <div class="field padding-bottom--24">
                    <span class="details">City</span>
                    <input name="city" type="text" placeholder="Your City" required />
                  </div>
            
                  <div class="field padding-bottom--24">
                    <span class="details">Select Category</span>
                    <select name="category+" id="department" required>
            
                      <option value="Technicians">All</option>
                      <option value="Technicians">Technicians</option>
                      <option value="AC Repairs">AC Repairs</option>
                      <option value="CCTV">CCTV</option>
                      <option value="Constructions">Constructions</option>
                      <option value="Electricians">Electricians</option>
                      <option value="Electronic Repairs">Electronic Repairs</option>
                      <option value="Glass & Aluminium">Glass & Aluminium</option>
                      <option value="Iron Works">Iron Works</option>
                      <option value="Masonry">Masonry</option>
                      <option value="Odd Jobs">Odd Jobs</option>
                      <option value="Pest Controllers">Pest Controllers</option>
                      <option value="Plumbing">Plumbing</option>
                      <option value="Wood Works">Wood Works</option>
                    </select>
                  </div>
            
                  <div class="field padding-bottom--24">
                    <span class="details">Date of Birth</span>
                    <input name="dob" type="date" placeholder="Garment email" required />
                  </div>
            
                </div>
            
                <div class="stugender-details">
                    <span class="gender-title">Gender</span><br>
                    <input type="radio" name="gender" id="dot-1" checked="male" >
                    <input type="radio" name="gender" id="dot-2" checked="female" >
                   
                    <div class="category">
                      <label for="dot-1">
                        <span class="dot one" value="male"></span>
                        <span class="gender">Male</span>
                      </label>
              
                      <label for="dot-2">
                        <span class="dot two" value="female"></span>
                        <span class="gender">Female</span>
                      </label>
                    </div>
                  </div>
            
                <div><br>
                  <h3>
            
                    Login Credintials
                  </h3>
                </div><br>
                <div class="parent-details">
            
                  <!-- <div class="input-box">
                    <span class="details">Parent with relationship</span>
                    <select name="department" id="department" required>
                      <option value="Mother">
                        Mother
                      </option>
                      <option value="Father">Father</option>
                      <option value="Other">Other</option>
                    </select>
                  </div> -->
            
                  <div class="field padding-bottom--24">
                    <span class="details">E-mail Adddress</span>
                    <input name="email" type="email" placeholder="Your email" required />
                  </div>
                  <div class="field padding-bottom--24">
                    <span class="details">Password</span>
                    <input name="password" type="text" placeholder="Password" required />
                  </div>
            
                  <div class="field padding-bottom--24">
                    <span class="details">Confirm Password</span>
                    <input name="re-password" type="text" placeholder="Confirm Password" required />
                  </div>
                </div>
            
            
                
                
              </form>
                

                </div>
                <div class="button">
                  <input type="submit" name="submit" value="Submit">
                </div>
                
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© ERRAND</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>