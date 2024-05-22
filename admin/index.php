<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@30,200,0,0" />

  <title>Dukaan Payouts V2</title>

  <style>
    body {
  font-family: 'Inter', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  margin: 0px;
  box-sizing: border-box;
  background-color: #e5e5e5;
}

.main {
  width: 1440px;
  height: 1482px;
  display: flex;
}

.menu {
  background-color: #1e2640;
  width: 20%;
  box-sizing: border-box;

}

.menu_part1 {
  display: flex;
  align-items: center;
  justify-content: space-between;

  padding: 11px 11px 11px 15px;
  box-sizing: border-box;
}

.menu_part2 {
  padding: 5px;
  box-sizing: border-box;
}

.menu_part3 {
  position: relative;
  top: 60%;
  display: flex;
  background-color: #353c53;
  color: #d2d4d9;
  align-items: center;
  box-sizing: border-box;
  margin: 0 15px;
  border-radius: 5px;
  padding: 7px 10px;

}

#storepic {
  background-color: white;
  width: calc(0.027*1440px);
  height: calc(0.027*1482px);
  border-radius: 5px;
}

#storedetails {
  color: white;
  flex-grow: 1;
  padding: 0 5%;
}

#visitstore {
  color: #d2d4d9;
  font-size: 0.75rem;
  line-height: 2;
  font-weight: 200;
}

#storename {
  font-size: 0.9rem;
  margin-top: 5px;
}

#storedetails a {
  color: rgb(231, 231, 231);
}

.material-symbols-outlined {
  color: white;
  box-sizing: border-box;

}

#storedropdown {
  width: 30px;
  height: 30px;
  box-sizing: border-box;
}

.menu_options {
  display: flex;
  align-items: center;
  color: #d2d4d9;
  margin: 2% 0;
  box-sizing: border-box;
  padding: 2% 4%;
  background-color: #1e2640;
  border-radius: 5px;
}

.menu_options:hover {
  display: flex;
  align-items: center;
  color: #ffffff;
  font-weight: 500;
  margin: 2%;
  box-sizing: border-box;
  padding: 2%;
  background-color: #343b53;
  border-radius: 5px;
}

.menu_option_icon {
  width: 25px;
  height: 25px;
  margin-left: 4px;
}

.menu_option_icon>.material-symbols-outlined {
  color: #d2d4d9;
  font-weight: 200;
}

.menu_option_icon>.material-symbols-outlined:hover {
  color: #ffffff;
}

.menu_option_name {
  font-size: 0.85rem;
  box-sizing: border-box;
  margin-left: 5%;
}

.credit_icon {
  background-color: #494f64;
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-sizing: border-box;
  border-radius: 5px;
}

.credit_text1 {
  font-size: 0.75rem;
  margin: 3px 0;
}

.credit_text {
  margin-left: 10px;
}

.credit_text2 {
  font-size: 0.9rem;
  color: #ffffff;
  margin: 3px 0;
  font-weight: 500;
}

.container {
  background-color: white;
  flex-grow: 1;
}

.navbar {
  height: 55px;
  border-bottom: 1px #d2d4d9 solid;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 30px;
  box-sizing: border-box;
}


.navbar3>.material-symbols-outlined {
  color: #4c4c4c;
  background-color: #e6e6e6;
  border-radius: 50%;
  padding: 6px;
  box-sizing: border-box;

}

.navbar1 {
  display: flex;
  justify-content: center;
  align-items: center;
}

#navbar1_1 {
  font-size: 0.9rem;
}

#navbar1_2 {
  font-size: 0.7rem;
  color: #4c4c4c;
}

#navbar1_3 {
  font-size: 0.7rem;
  color: #4c4c4c;
  border-radius: 50%;
  border: 1px solid #4c4c4c;
}

.navbar1_howitworks>.material-symbols-outlined {
  color: #4c4c4c;
  border-radius: 50%;
  padding: 4px;
  box-sizing: border-box;
  font-weight: 800;
}

#navbar2_1 {
  border: none;
  outline: none;
  background-color: #f2f2f2;
  width: 460px;
  font-size: 1rem;
  padding: 7px 15px 7px 35px;
  box-sizing: border-box;
  border-radius: 5px;

}

#navbar2_1::placeholder {
  font-family: 'Inter', sans-serif;
  font-size: 0.8rem;
  opacity: 0.5;
}

.navbar2 {
  display: flex;
  align-items: center;
}

.navbar2>svg {
  position: relative;
  left: 25px;
}

.navbar1_howitworks {
  position: absolute;
  left: 570px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.content {
  margin: 30px;
  box-sizing: border-box;
}

.content1 {
  display: flex;
  justify-content: space-between;
  align-items: center;

}

.content1_1 {
  font-size: 1.1rem;
  font-weight: 500;
}

#content1_2_select {
  font-family: 'Inter', sans-serif;
  background-color: white;
  padding: 8px 43px 8px 13px;
  box-sizing: border-box;
  border: 1px #d2d4d9 solid;
  border-radius: 5px;
  font-size: 1rem;
  color: #4c4c4c;
  appearance: none;

}

.content1_2_arrow {
  position: absolute;
  color: #1e2640;
  right: 270px;
}

.content1_2 {
  display: flex;
  align-items: center;
}

.content2 {
  display: flex;
  gap: 20px;
  box-sizing: border-box;
  margin: 30px 0px;
}

.online_orders {
  flex-grow: 1;
}

.amount_recieved {
  flex-grow: 1;
}

.online_orders_1,
.amount_recieved_1 {
  font-size: 0.95rem;
  color: #4c4c4c;
  margin: 15px;
  box-sizing: border-box;
}

.online_orders_2,
.amount_recieved_2 {
  font-size: 2rem;
  font-weight: 500;
  margin: 15px;
  box-sizing: border-box;
}

.shadow {
  box-shadow: 1px 1px #f3f3f3;
  border-radius: 5px;

}

.content3 {
  font-size: 1.1rem;
  font-weight: 500;
  margin: 30px 0px;
  box-sizing: border-box;
}

#navbar4_1_input {
  border: 1px solid #d2d4d9;
  background-color: #ffffff;
  width: 260px;
  font-size: 0.9rem;
  padding: 10px 15px 10px 35px;
  box-sizing: border-box;
  border-radius: 5px;
  font-family: 'Inter', sans-serif;
}

.content4 {
  box-sizing: border-box;
  margin: 0 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.content4_1 {
  display: flex;
  align-items: center;
}


.content4_1>.content4_1_searchicon {
  position: absolute;
  left: 485px;
}

.content4_2_sort_2>.material-symbols-outlined {
  color: #353c53;
}

.content4_2_download>.material-symbols-outlined {
  color: #353c53;
}

.content4_2 {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 15px;

}

.content4_2_sort {
  display: flex;
  justify-content: center;
  gap: 5px;
  align-items: center;
  box-sizing: border-box;
  border: 1px solid #d2d4d9;
  padding: 5px 5px 5px 10px;
  border-radius: 5px;
  font-size: 0.95rem;
  color: #4c4c4c;
}

.content4_2_sort_2 {
  width: 24px;
  height: 24px;
}

.content4_2_download {
  width: 24px;
  height: 24px;
  border: 1px solid #d2d4d9;
  padding: 5px 4px;
  border-radius: 5px;
  font-size: 0.95rem;
  color: #4c4c4c;
}

.content5>table {

  box-sizing: border-box;
  font-size: 0.9rem;
  border-collapse: collapse;
  min-width: 1160px;
  margin: 10px;
}

td,
th {
  padding: 0;
  border: 0;

}

thead {
  background-color: #f2f2f2;
  border-radius: 5px;
  text-align: center;

}

td {
  font-weight: 400;
  padding: 13px 10px;
  box-sizing: border-box;
  border-bottom: 1px solid #d2d4d9;
}

th {
  font-weight: 500;
  padding: 10px;
  box-sizing: border-box;
  color: #4c4c4c;
}

th:nth-child(1) {
  text-align: left;
}

th:nth-child(4),
th:nth-child(3) {
  text-align: right;
}

tr>td:nth-child(1) {
  text-align: left;
  color: #146eb4;
  font-weight: 500;

}

tr>td:nth-child(4),
tr>td:nth-child(3) {
  text-align: right;
}

tr>td:nth-child(2) {
  text-align: center;
}

.content6 {
  display: flex;
  justify-content: center;
  gap: 20px;
  align-items: center;
  box-sizing: border-box;
  margin-top: 40px;
  color: #4c4c4c;
  font-size: 0.9rem;
}

.content6_2 {
  display: flex;
  gap: 5px;
}

.pageno {
  box-sizing: border-box;
  padding: 5px;
  border-radius: 5px;
}

.pageno:hover {
  background-color: #146eb4;
  color: white;
}

.content6_1 {
  display: flex;
  align-items: center;
  padding: 2px 10px 3px 0px;
  box-sizing: border-box;
  border: 1px solid #d2d4d9;
  border-radius: 5px;

}

.content6_3 {
  display: flex;
  align-items: center;
  padding: 2px 0px 3px 10px;
  box-sizing: border-box;
  border: 1px solid #d2d4d9;
  border-radius: 5px;

}

.content6_1_1,
.content6_3_2 {
  width: 24px;
  height: 24px;
}

.content6_1_1>.material-symbols-outlined,
.content6_3_2>.material-symbols-outlined {
  color: #4c4c4c;
}

.shadowforlastbox {
  box-shadow: 1px 1px #f3f3f3;
  padding-bottom: 20px;
}
  </style>
</head>

<body>
  <div class="main">
    <div class="menu">
      <div class="menu_part1">
        <div id="storepic"></div>
        <div id="storedetails">
          <div id="storename">Nishyan</div>
          <div><a id="visitstore" href="#">Visit Store</a></div>
        </div>
        <div id="storedropdown"><span style="font-size: 30px;" class="material-symbols-outlined">
            expand_more
          </span></div>
      </div>
      <div class="menu_part2">
        <div class="menu_options1 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px; font-weight: 300;"
              class="material-symbols-outlined">
              home
            </span></div>
          <div class="menu_option_name">Home</div>
        </div>
        <div class="menu_options2 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              assignment
            </span></div>
          <div class="menu_option_name">Orders</div>
        </div>
        <div class="menu_options3 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              grid_view
            </span></div>
          <div class="menu_option_name">Products</div>
        </div>
        <div class="menu_options4 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              local_shipping
            </span></div>
          <div class="menu_option_name">Delivery</div>
        </div>
        <div class="menu_options5 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              campaign
            </span></div>
          <div class="menu_option_name">Marketing</div>
        </div>
        <div class="menu_options6 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              leaderboard
            </span></div>
          <div class="menu_option_name">Analytics</div>
        </div>
        <div class="menu_options7 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              payments
            </span>
          </div>
          <div class="menu_option_name">Payments</div>
        </div>
        <div class="menu_options8 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              interests
            </span>
          </div>
          <div class="menu_option_name">Tools</div>
        </div>
        <div class="menu_options9 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              percent
            </span>
          </div>
          <div class="menu_option_name">Discounts</div>
        </div>
        <div class="menu_options10 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              group
            </span></div>
          <div class="menu_option_name">Audience</div>
        </div>
        <div class="menu_options11 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              palette
            </span></div>
          <div class="menu_option_name">Appearance</div>
        </div>
        <div class="menu_options12 menu_options">
          <div class="menu_option_icon"><span style="font-size: 25px;" class="material-symbols-outlined">
              bolt
            </span></div>
          <div class="menu_option_name">Plugins</div>
        </div>
      </div>
      <div class="menu_part3">
        <div class="credit_icon"><span style="font-size: 30px;" class="material-symbols-outlined">
            account_balance_wallet
          </span></div>
        <div class="credit_text">
          <div class="credit_text1">Available Credits</div>
          <div class="credit_text2">222.10</div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="navbar">
        <div class="navbar1"><span id="navbar1_1">Payments</span>
          <div class="navbar1_howitworks"><span style="font-size: 20px;" class="material-symbols-outlined">
              help
            </span><span id="navbar1_2">How it works</span>
          </div>
        </div>
        <div class="navbar2">
          <svg width="17px" height="17px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path
                d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                stroke="#848484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
          </svg><input type="text" placeholder="Search features, tutorials, etc." name="" id="navbar2_1">
        </div>
        <div class="navbar3"><span class="material-symbols-outlined">
            comment
          </span>&nbsp;&nbsp;&nbsp;<span class="material-symbols-outlined">
            expand_more
          </span></div>
      </div>
      <div class="content">
        <div class="content1">
          <div class="content1_1">Overview</div>
          <div class="content1_2">
            <select name="" id="content1_2_select">
              <option selected="Last month">Last month</option>
            </select>
            <span style="font-size: 30px;" class="content1_2_arrow material-symbols-outlined">
              expand_more
            </span>

          </div>
        </div>
        <div class="content2">
          <div class="online_orders shadow">
            <div class="online_orders_1">Online orders</div>
            <div class="online_orders_2">232</div>
          </div>
          <div class="amount_recieved shadow">
            <div class="amount_recieved_1">Amount recieved</div>
            <div class="amount_recieved_2"> &#8377;23,92,312.19</div>
          </div>
        </div>
        <div class="content3">
          Transactions | This month
        </div>
        <div class="shadowforlastbox">
          <div class="content4">
            <div class="content4_1">
              <div class="content4_1_searchicon">
                <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                      stroke="#848484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                </svg>
              </div>
              <div><input type="text" placeholder="Search by order ID..." name="" id="navbar4_1_input">
              </div>
            </div>
            <div class="content4_2">
              <div class="content4_2_sort">
                <div class="content4_2_sort_1">Sort</div>
                <div class="content4_2_sort_2"><span class="material-symbols-outlined">
                    swap_vert
                  </span></div>
              </div>
              <div class="content4_2_download"><span class="material-symbols-outlined">
                  download
                </span></div>
            </div>
          </div>
          <div class="content5">
            <table>
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Order amount</th>
                  <th>Transaction fees</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>
                <tr>
                  <td>#281209</td>
                  <td>7 July, 2023</td>
                  <td>&#8377;1,278.23</td>
                  <td>&#8377;22</td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="content6">
            <div class="content6_1">
              <div class="content6_1_1"><span class="material-symbols-outlined">
                  chevron_left
                </span></div>
              <div class="content6_1_2">Previous</div>
            </div>
            <div class="content6_2">
              <div class="content6_2_1 pageno">1</div>
              <div class="content6_2_2 pageno">...</div>
              <div class="content6_2_3 pageno">10</div>
              <div class="content6_2_4 pageno">11</div>
              <div class="content6_2_5 pageno">12</div>
              <div class="content6_2_6 pageno">13</div>
              <div class="content6_2_7 pageno">14</div>
              <div class="content6_2_8 pageno">15</div>
              <div class="content6_2_9 pageno">16</div>
              <div class="content6_2_10 pageno">17</div>
            </div>
            <div class="content6_3">
              <div class="content6_3_1">Next</div>
              <div class="content6_3_2"><span class="material-symbols-outlined">
                  chevron_right
                </span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>