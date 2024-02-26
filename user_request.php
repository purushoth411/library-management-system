<!-- User registration page-->

<!DOCTYPE html>
<html>

<head>
  <title>New User Registration</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <style>
    html,
    body {
      min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    textarea,
    label,
    p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
    }

    h1 {
      position: absolute;
      margin: 0;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
    }

    textarea {
      width: calc(100% - 12px);
      padding: 5px;
    }

    .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      margin: auto;
      margin-top: 50px;
      width: 50%;
    }

    form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px #669999;
    }

    .banner {
      position: relative;
      height: 50px;

      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .banner::after {
      content: "";
      background-color: gray;
      position: absolute;
      width: 100%;
      height: 100%;
    }

    input,
    select,
    textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input {
      width: calc(100% - 10px);
      padding: 5px;
    }

    input[type="date"] {
      padding: 4px 5px;
    }

    textarea {
      width: calc(100% - 12px);
      padding: 5px;
    }

    .item {
      position: relative;
      margin: 10px 0;
    }

    .item span {
      color: red;
    }

    .week {
      display: flex;
      justify-content: space-between;
    }

    .colums {
      display: flex;
      justify-content: space-between;
      flex-direction: row;
      flex-wrap: wrap;
    }

    .colums div {
      width: 48%;
    }

    input[type="date"]::-webkit-inner-spin-button {
      display: none;
    }

    .item i,
    input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a3c2c2;
    }

    .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
    }

    input[type=radio],
    input[type=checkbox] {
      display: none;
    }

    label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
    }

    .question span {
      margin-left: 30px;
    }

    .question-answer label {
      display: block;
    }

    label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
    }

    input[type=radio]:checked+label:before,
    label.radio:hover:before {
      border: 2px solid #669999;
    }

    label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid #669999;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
    }

    input[type=radio]:checked+label:after {
      opacity: 1;
    }

    .flax {
      display: flex;
      justify-content: space-around;
    }

    .btn-block {
      margin-top: 10px;
      text-align: center;
    }

    button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background: #669999;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
    }

    button:hover {
      background: #a3c2c2;
    }

    @media (min-width: 568px) {

      .name-item,
      .city-item {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .name-item input,
      .name-item div {
        width: calc(50% - 20px);
      }

      .name-item div input {
        width: 97%;
      }

      .name-item div label {
        display: block;
        padding-bottom: 5px;
      }
    }

    body {
      background-color: #666;
    }
  </style>
</head>

<body>
  <div class="testbox">
    <form action="adduser_request.php" method="post">
      <div class="banner">
        <h1>New User Registration</h1>
      </div>
      <div class="colums">
        <div class="item">
          <label for="name"> Name<span>*</span></label>
          <input id="name" type="text" name="name" required />
        </div>
        <div class="item">
          <label for="email">Email Address<span>*</span></label>
          <input id="email" type="text" name="email" required />
        </div>
        <div class="item">
          <label for="password">Password<span>*</span></label>
          <input id="password" type="text" name="password" required />
        </div>
      </div>

      <label for="type">Choose type:</label>
      <select name="type">
        <option value="student">student</option>
        <option value="teacher">teacher</option>
      </select>
      <div class="btn-block">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</body>

</html>