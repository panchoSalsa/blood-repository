// Rules based on https://dmsc.mind.uci.edu/redcap/redcap_v7.0.9/Design/data_dictionary_codebook.php?pid=141


$('#builder').queryBuilder({
	filters: [{
    id: 'id',
    label: 'id',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  },
  {
    id: 'study',
    label: 'study',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  },
  {
    id: 'patient_id',
    label: 'patient id',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  },
  {
    id: 'synd',
    label: 'synd',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains']
  },
  {
    id: 'mci_cat',
    label: 'mcicat',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains']
  },
  {
    id: 'dx',
    label: 'dx',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains']
  },
  {
    id: 'visit',
    label: 'visit',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  },
  {
    id: 'age',
    label: 'age',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains', 'greater', 'less'],
    validation: {
      min: 0
    }
  },
  {
    id: 'sex',
    label: 'sex',
    type: 'string',
    input: 'select',
    values: {
      'M': 'Male',
      'F': 'Female'
    },
    operators: ['equal', 'not_equal']
  },
  {
    id: 'mmse',
    label: 'mmse',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  },
  {
    id: 'staff',
    label: 'staff',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains']
  },
  {
    id: 'created_by',
    label: 'created by',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains']
  },
  {
    id: 'modified_by',
    label: 'modified by',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains']
  },
  {
    id: 'serum_count',
    label: 'serum count',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  },
  {
    id: 'plasma_count',
    label: 'plasma count',
    type: 'integer',
    operators: ['equal', 'not_equal', 'contains'],
    validation: {
      min: 0
    }
  }],
  	allow_groups: false
});


$('#builder').on('validationError.queryBuilder', function(e, rule, error, value) {
	// never display error for my custom filter
	console.log("YOU HAVE AN ERROR in queryBuilder");
	//e.preventDefault();
});