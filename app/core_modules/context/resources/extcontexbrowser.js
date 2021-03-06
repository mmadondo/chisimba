var isLoaded = new Array();
isLoaded['my_courses'] = false;
isLoaded['other_courses'] = false;
isLoaded['search_courses'] = false;


// basic tabs 1, built from existing content
var tabs = new Ext.TabPanel({
    el: 'contextbrowser',
    width:"100%",
    activeTab: 0,
    plain:true,
    frame:true,
    defaults:{
        autoHeight: true
    },


    items:[
    {
        items: [usergrid],
        itemId: 'my_courses',
        title: lang['mycontext']
    },{
        //html:' other courses goes here',
        items:[othergrid],
        itemId: 'other_courses',
        title: lang['othercontext']
    }

    ],

			

    listeners:{
        tabchange: function(p, tab){
            loadTabData(tab.getItemId());

        }
    }
});


function loadTabData(tabId){
	
    switch(tabId)
    {
        case 'my_courses':
            if(isLoaded[tabId] == false)
            {
                usercontextdata.load({
                    params:{
                        start:0,
                        limit:pageSize
                    }
                });
                isLoaded[tabId] = true;
            }
            break;
        case 'other_courses':
            if(isLoaded[tabId] == false)
            {
                othercontextdata.load({
                    params:{
                        start:0,
                        limit:pageSize
                    }
                });
                isLoaded[tabId] = true;
            }
            break;
        case 'search_courses':
            if(isLoaded[tabId] == false)
            {
                contextdata.load({
                    params:{
                        start:0,
                        limit:pageSize
                    }
                });
                isLoaded[tabId] = true;
            }
            break;
    }
	
}

Ext.onReady(function(){

    tabs.render();
    //contextdata.load({params:{start:0, limit:pageSize}});
    //usercontextdata.load({params:{start:0, limit:pageSize}});
    //othercontextdata.load({params:{start:0, limit:pageSize}});
    if(isAdmin == true)
    {
        tabs.add({
            items:[grid],
            //html:' search courses goes here',
            itemId: 'search_courses',
            title: lang['searchcontext']
        });
    }

	
});
