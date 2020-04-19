var chat = {

    groups:[],

    setGroup:function(id, name) {

        var found = false

        for(var i in this.groups) {
            if(this.groups[i].id == id) {
                found = true
            }
        }

        if(found == false) {
            this.groups.push({
                id:id,
                name:name
            })
        }
    },
    getGroups:function(){
        return this.groups
    }
}
