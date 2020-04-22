function addGroupModal() {
    var html = '<h3>Criar Nova Sala</h3>'
    html += '<input type="text" id="newGroupName" placeholder="Digite o nome da nova sala"/>'
    html += '<br><button id="newGroupButton">Cadastrar</button>'
    html += '<hr>'
    html += '<button onclick="fecharModal()">Fechar Janela</button><br><br><hr>'
    $('.modal_area').html(html)
    $('.modal_bg').show()

    $('#newGroupButton').on('click', function(){
        var newGroupName = $('#newGroupName').val()

        if(newGroupName != '') {
            chat.addNewGroup(newGroupName, function(json) {
                if (json.error == '0') {
                    $('.add_tab').click()
                } else {
                    alert(json.errorMsg)
                }
            })
        }
    })
}

function fecharModal() {
    $('.modal_bg').hide()
}

$(function(){
    chat.chatActivity()
    $('.add_tab').on('click', function(){

        var html = '<h3>Nova Janela de Bate Papo</h3>'
            html += '<div id="groupList">Carregando...</div><hr>'
            html += '<button onclick="addGroupModal()">Criar Nova Sala</button><br><br><hr>'
            html += '<hr>'
            html += '<button onclick="fecharModal()">Fechar Janela</button><br><br><hr>'
            $('.modal_area').html(html)
            $('.modal_bg').show()
      

        chat.loadGroupList(function(json){
            var html = ''
            for(var i in json.list){
                html += '<button data-id="'+json.list[i].id+'">'+json.list[i].name+'</button>'
            }
            $('#groupList').html(html)

            $('#groupList').find('button').on('click', function(){
                var cid = $(this).attr('data-id')
                var cnm = $(this).text()

                chat.setGroup(cid, cnm)
                fecharModal()
            })
        })
    })

    $('nav ul').on('click', 'li', function(){
        var id = $(this).attr('data-id')
        chat.setActiveGroup(id)
    })

    $('#sender_input').on('keyup', function(e) {
        //console.log(e.keyCode)
        if(e.keyCode == 13){
            var msg = $(this).val()
            $(this).val('')
            chat.sendMessage(msg)
        }
    })
})