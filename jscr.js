
function setUpdateProd() 
{
document.frmUser.action = "edit_prod.php";
document.frmUser.submit();
}



function setDeleteProd()
{
if(confirm("Are you sure want to delete this Product?"))
{
document.frmUser.action = "delete_prod.php";
document.frmUser.submit();
}
}

function setDeleteDebc()
{
if(confirm("Are you sure want to delete this Customer?"))
{
document.frmUser.action = "delete_debt.php";
document.frmUser.submit();
}
}

function goback()
{
window.history.Back();
}
