QUnit.extend(QUnit,{close:function(e,c,d,b){var a=(e===c)||Math.abs(e-c)<=d;QUnit.push(a,e,c,b)},notClose:function(d,b,c,a){QUnit.push(Math.abs(d-b)>c,d,b,a)}});