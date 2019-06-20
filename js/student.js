$(function () {
    let table = $('tbody');
     let progress=$('.progress');
    let progressnei=$('.progress-bar');

    $(document).ajaxStart(function () {
        console.log(1);

        progressnei.css({width:'30%',display:'block'})
    });
    $(document).ajaxSuccess(function () {
        console.log(2);
        progressnei.css({width:'100%',display:'block'})
    });
    progressnei.on('webkitTransitionEnd',function () {
        $(this).css({width:'0',display:'none'})
        console.log(5);
    })

    $.ajax({
        url:'../php/query.php',
        type:'GET',
        async:true,
        data:"name=zhangsan&age=18",
        dataType:'json',
        success: function (res) {
            let {code,data} = res;

            if (code == 1){
                render(data);
            }
        }
    });

    //删除
    table.on('click','button',function () {

        let tr = $(this).closest('tr');
        let id = tr.attr('id');
        $.ajax({
            url:'../php/delete.php',
            type:'POST',
            async:true,
            data:{id},
            dataType:'json',
            success: function (res) {
                let {code,data} = res;
                if (code == 1){

                    tr.remove();
                }else{

                }
            }
        });
    });

    //render
    function render(data) {
        let html = '';
        data.forEach(ele=>{
            html +=`
                <tr id="${ele.id}">            
                    <td><input type="text" value="${ele.name}"></td>
                    <td><input type="text" value="${ele.sex}"></td>
                    <td><input type="text" value="${ele.age}"></td>
                    <td><input type="text" value="${ele.major}"></td>
                    <td><button class="btn btn-warning btn-sm">删除</button></td>
                </tr>
            `
        });

        table.html(function (index, value) {
            table.html((index,value)=>value+=html);

        })

    }
});