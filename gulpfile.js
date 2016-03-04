var argv = require('yargs').argv;
var fs = require('fs');
var crypto = require('crypto');
var gulp = require('gulp');

gulp.task('default', function() {
	if(typeof(argv.pass) == 'undefined' || argv.pass.length == 0) {
		console.log("Please enter password");
		return ;
	}

	fs.readFile('./sensitive.php', 'binary', function(err, contents) {
		if(err) throw err;

		var key = argv.pass.toString().toString('hex');

		var cipher = crypto.createCipher('aes256', key);
    var enc = cipher.update(contents, 'binary', 'base64');
    enc += cipher.final('base64');

    fs.writeFile('./sensitive.php.encrypt', enc);
	});
});

gulp.task('decrypt', function() {
	if(typeof(argv.pass) == 'undefined' || argv.pass.length == 0) {
		console.log("Please enter password");
		return ;
	}

	fs.readFile('./sensitive.php.encrypt', 'binary', function(err, contents) {
		if(err) throw err;

		var key = argv.pass.toString().toString('hex');
		
		var decipher = crypto.createDecipher('aes256', key);
	  var enc = decipher.update(contents, 'base64', 'utf8');

	  try {
	  	enc += decipher.final('utf8');
	  	fs.writeFile('./sensitive.php', enc);
		} catch(e) {
			console.log("Password is incorrect :P");
		}
	});
});