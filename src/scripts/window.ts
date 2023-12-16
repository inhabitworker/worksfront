function menuToggle(): void {
	// Could probably be more elegant with a blur (click out zone).
	console.log("togling menu");
	let menu: HTMLElement | null = document.getElementById("main-menu");
	if(menu) {
		menu.className === "responsive" ? menu.className = "" : menu.className = "responsive";
	} else {
		console.log("Can't find menu element.");
	} 
}

export default { menuToggle: menuToggle }
