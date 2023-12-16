// I'll do a placeholder landing page here.

import * as THREE from 'three'
// import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';



export function frontpage(): void {
	const scene = new THREE.Scene();
	const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

	const geometry = new THREE.BoxGeometry( 1, 1, 1 );
	const material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
	const cube = new THREE.Mesh( geometry, material );
	scene.add( cube );
	
	camera.position.z = 5;

	const renderer = new THREE.WebGLRenderer();

	let target = document.getElementById('frontpage');

	if (target) {
		renderer.setSize( target.clientWidth, target.clientHeight);
		target.appendChild( renderer.domElement );

		function animate() {
			requestAnimationFrame( animate );

			cube.rotation.x += 0.01;
			cube.rotation.y += 0.01;
			renderer.render( scene, camera );
		}
		animate();
	}
}
