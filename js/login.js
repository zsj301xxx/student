$(function () {
    let submitBtn =$(':submit');
    let userBtn = $(':text');
    let passBtn = $(':password');

    // submitBtn.on('click',function () {
    //     let user = userBtn.val() , password = passBtn.val();
    //     let xml = new XMLHttpRequest();
    //     xml.open('get','./php/login.php?user='+user+'&password='+password);
    //     xml.send(null);
    //     xml.onload =function () {
    //         console.log(xml.response);
    //     }
    // });
    submitBtn.on('click',function (e) {
        e.preventDefault();
        // console.log($('form').serialize());
        let qs =$('form').serialize();

        let xml = new XMLHttpRequest();
        xml.open('POST','./php/php.php');
        xml.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xml.responseType='json';
        xml.send(qs);

        xml.onload = function () {
            console.log(xml.response);
            let {code,msg}=xml.response;
            console.log(typeof xml.response);
            console.log(code);
            console.log(msg);
            if(code==1){
                alert(msg);
                location.href ='./php/student.php';
            }else{
                alert(msg);
            }

        }
    });
});