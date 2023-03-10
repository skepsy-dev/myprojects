


// Navbar
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})



// get ethereum address
const loggedAddress = [];
 
document.getElementById('loginButton').addEventListener('click', event => {
      let account;
      let button = event.target;

      // connect to address
      ethereum.request({method: 'eth_requestAccounts'}).then(accounts => {
        account = accounts[0];
        // account = '0xd78e5ade2cdc907688a4feb888ef6c60c0a16f53';
        // web3Utils.toChecksumAddress(account);
        console.log(account);
        button.textContent = account;
       
        loggedAddress.push(account);

        // show projects on login btn click
        if (account == "") {
          document.getElementById("showprojs").innerHTML="";
          return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("showprojs").innerHTML=this.responseText;
          }
        }
   
        xmlhttp.open("GET","showproj.php?q="+account);
        xmlhttp.send();


      });
      // get address balance
        // ethereum.request({method: 'eth_getBalance' , params: [account, 'latest']}).then(result => {

        //   let wei = parseInt(result,16);
        //   let balance = wei / (10**18);
          
        //   document.getElementById('balBtn').innerHTML = balance;
        // }); 
});
document.getElementById('loginButton2').addEventListener('click', event => {
  let account;
  let button = event.target;

  // connect to address
  ethereum.request({method: 'eth_requestAccounts'}).then(accounts => {
    account = accounts[0];
    // account = '0xd78e5ade2cdc907688a4feb888ef6c60c0a16f53';
    // web3Utils.toChecksumAddress(account);
    console.log(account);
    button.textContent = account;
   
    loggedAddress.push(account);

    // show projects on login btn click
    if (account == "") {
      document.getElementById("showprojs").innerHTML="";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("showprojs").innerHTML=this.responseText;
      }
    }

    xmlhttp.open("GET","showproj.php?q="+account);
    xmlhttp.send();


  });
});
window.onload = function(){
  document.getElementById('loginButton2').click();
  
var scriptTag = document.createElement("script");
scriptTag.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js";
document.getElementsByTagName("head")[0].appendChild(scriptTag);
}


// Add New Project Modal
function showAddNew() {
	document.querySelector('.addNewProj-bg-modal').style.display = "flex";
  document.getElementById('loggedInAddy').value = loggedAddress[0];
};

document.querySelector('.addNewProj-close').addEventListener("click", function() {
	document.querySelector('.addNewProj-bg-modal').style.display = "none";
});

function insertAdd() {
  // console.log(loggedAddress[0]);
  document.getElementById('loggedInAddy').value = loggedAddress[0];
}
function logout() {
  // console.log(loggedAddress[0]);
  window.location.href = "index.php";
}




// Edit Project Modal
function showEditProj(get_ids) {
  document.querySelector('.editProj-bg-modal').style.display = "flex";

  var column = document.getElementById("row_data"+get_ids);

  $('#edit_user_address').val(column.cells[0]['innerText']);
  $('#edit_proj_id').val(column.cells[1]['innerText']);
  $('#edit_mint_date').val(column.cells[2]['innerText']);
  $('#edit_project_name').val(column.cells[3]['innerText']);
  $("#edit_mintlist option[value='"+column.cells[4]['innerText']+"']").prop('selected', true);
  $('#edit_price').val(column.cells[5]['innerText']);
  $('#edit_website').val(column.cells[6]['innerText']);
  $('#edit_twitter').val(column.cells[8]['innerText']);
  $('#edit_note').val(column.cells[10]['innerText']);
};

document.querySelector('.editProj-close').addEventListener("click", function() {
  document.querySelector('.editProj-bg-modal').style.display = "none";
});




// Delete Project Modal Buttons
function showDeleteProj(get_ids) {
  document.querySelector('.deleteProj-bg-modal').style.display = "flex";
  
  var column = document.getElementById("row_data"+get_ids);
  $('#delete_user_address').val(column.cells[0]['innerText']);
  $('#delete_id').val(column.cells[1]['innerText']);
  $('#delete_name').val(column.cells[3]['innerText']);
};

document.querySelector('.deleteProj-close').addEventListener("click", function() {
	document.querySelector('.deleteProj-bg-modal').style.display = "none";
});




// Edit and Delete Modals
// $(document).ready(function() {

//     $('.editbtn').on('click', function() {
    
//         $('#editmodal').modal('show');

//         $tr = $(this).closest('tr');

//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         console.log(data);

//         document.getElementById('edit_user_address').value = data[0];

//         $('#edit_user_address').val(data[0]);
//         $('#edit_proj_id').val(data[1]);
//         $('#edit_mint_date').val(data[2]);
//         $('#edit_project_name').val(data[3]);
//         $('#edit_mintlist').val(data[4]);
//         $('#edit_price').val(data[5]);
//         $('#edit_website').val(data[6]);
//         $('#edit_twitter').val(data[7]);
//         $('#edit_note').val(data[8]);
//     });
// });



// $(document).ready(function() {

//     $('.deletebtn').on('click', function() {

//         $('#deletemodal').modal('show');

//         $tr = $(this).closest('tr');

//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         console.log(data);

//         $('#delete_id').val(data[1]);
//         $('#delete_name').val(data[3]);

//     });
// });
