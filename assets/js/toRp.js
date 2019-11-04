function toRp(uangAnda) {
	let toRp = uangAnda
			.toString()
			.split("")
			.reverse()
			.join(""),
		uang = toRp.match(/\d{1,3}/g);
	uang = uang
		.join(".")
		.split("")
		.reverse()
		.join("");
	return uang;
}
