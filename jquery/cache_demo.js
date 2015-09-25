var JKB = new Object();
JKB.cache = {
    index_pic: null,
    task_id_list: [],
    task_list_data: [],
    task_id:		0,
    ids:			'',
    host_id:		0,
    curr_period:	'',
    date_range:		'', // 时间范围的原始字符串
    task_comp_sum:	0,
    task_list_page:	'', // 监控项目列表视图
    page:			1,	// 页码
    display_cache:	{},
    ajax_tips:		{},	// ajax tips content
    ajax_layer_init:{},	// ajax layer counter
    required_fields:[],
    validate_params:[],
    error_fields:   {},
    search_status:  '',
    addTaskId: function(id)
    {
        this.task_id_list.push(id);
    },
    setCurrPeriod: function(period)
    {
        this.curr_period = period;
    },
    url_add_period: function(a)
    {
        a.href += (a.href.indexOf('?') == -1 ? '?' : '&') + 'period=' + this.curr_period + '&range=' + this.date_range;
    }
};