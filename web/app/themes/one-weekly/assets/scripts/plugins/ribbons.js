"use strict";

var container, stats;

var camera, scene, renderer;

var ribbons     = [];
var targets     = [];

var amount      = 50;
var counter     = 0;
var friction    = 0.01;
var spring      = 0.9;
var speed     = 30;
var movement    = 10;
var camPos      = new THREE.Vector3();

var px = 0;
var py = 0;
var pz = 0;

var windowHalfX = window.innerWidth / 2;
var windowHalfY = window.innerHeight / 2;

var oldTime   = new Date().getTime();
var radius    = 7000;
var theta   = 0;

initRibbons();

function initRibbons()
{
	container = document.createElement( 'div' );
	document.body.appendChild( container );
	
	scene   = new THREE.Scene();
	scene.fog = new THREE.FogExp2( 0xaaccff, 0.0001 );

	camera = new THREE.Camera( 25, window.innerWidth / window.innerHeight, 1, 10000 );
	camera.position.z = 5000;
	
	var ambient = new THREE.AmbientLight( 0x333333 );
	scene.addLight( ambient );


	var light = new THREE.DirectionalLight( 0xffffff, 2 );
	light.position.x = 1;
	light.position.y = 1;
	light.position.z = 1;
	light.position.normalize();
	scene.addLight( light );

	var light = new THREE.DirectionalLight( 0xffffff );
	light.position.x = - 1;
	light.position.y = - 1;
	light.position.z = - 1;
	light.position.normalize();
	scene.addLight( light );
	

	renderer = new THREE.WebGLRenderer( { antialias: true, clearColor: 0xaaccff, clearAlpha: 1 } );
	renderer.setSize(  window.innerWidth, window.innerHeight );
	renderer.sortObjects = false;
	
	createRibbons();
	getNextRandomPosition();

	container.appendChild( renderer.domElement );

	stats = new Stats();
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.top = '0px';
	container.appendChild( stats.domElement );
	
	loop();
}

function getNextRandomPosition()
{
	for (var i=0; i<amount; i++)
	{
		var dx    = Math.cos(ribbons[i].ax * theta) * speed;
		var dy    = Math.sin(ribbons[i].ay * theta) * speed;
		var dz    = Math.sin(ribbons[i].az * theta) * speed;
		
		targets[i*3]  += dx;
		targets[i*3+1]  += dy;
		targets[i*3+2]  += dz;
	}
}

function createRibbons()
{
	for (var i=0; i<amount; i++)
	{
		var ribbon = new Ribbon();
		ribbons.push(ribbon);
		targets.push(0, 0, 0);
		scene.addObject(ribbon.mesh);
	}
}
	
function loop()
{
	requestAnimationFrame( loop, renderer.domElement );
	
	for (var i=0; i<ribbons.length; i++)
	{
		px      = targets[i*3];
		py      = targets[i*3+1];
		pz      = targets[i*3+2];
		
		
		var ribbon  = ribbons[i];
		ribbon.update(px, py, pz);
		
		if (counter%10 == 0)  getNextRandomPosition();
	}

	theta += 1;
	camera.position.x = radius * Math.sin( theta * Math.PI / 360 );
	camera.position.y = radius * Math.sin( theta * Math.PI / 360 );
	camera.position.z = radius * Math.cos( theta * Math.PI / 360 );
	
	renderer.render(scene, camera);
	
	camera.update();
	stats.update();
	
	counter++;
}


function Ribbon()
{
	this.positions      = [];
	this.rotations      = [];
	
	this.x          = 0;
	this.y          = 0;
	this.z          = 0;
	
	this.velX       = 0;
	this.velY       = 0;
	this.velZ       = 0;
	
	this.ax         = randomRange(-movement, movement);
	this.ay         = randomRange(-movement, movement);
	this.az         = randomRange(-movement, movement);
	
	this.width        = randomRange(5, 30);
	this.length       = randomRange(80, 140);
	
	this.geom       = new THREE.PlaneGeometry(30, 30, 1, this.length-1);
	
	this.material     = new THREE.MeshLambertMaterial( { color:  Math.random()*0xFFFFFF } );
	
	this.mesh       = new THREE.Mesh(this.geom, this.material);
	this.mesh.dynamic   = true;
	
	this.mesh.rotation.x  = 90;
	this.mesh.doubleSided = true;
	
	for (var i=0; i<this.length*2; i++)
	{
		this.positions.push(0);
		this.rotations.push(0);
	}
	
	this.update = function(x, y, z)
	{
		
		this.velY += (y - this.velY) * friction;
		this.velZ += (z - this.velZ) * friction;
		
		this.x    += this.velX  = (this.velX + (x - this.x) * friction) * spring;
		this.y    += this.velY  = (this.velY + (y - this.y) * friction) * spring;
		this.z    += this.velZ  = (this.velZ + (z - this.z) * friction) * spring;
		
		this.positions.pop();
		this.positions.pop();
		this.positions.pop();
		
		this.rotations.pop();
		this.rotations.pop();
		this.rotations.pop();
		
		this.positions.unshift(this.x, this.y, this.z);
		this.rotations.unshift(Math.cos(counter*.1)*this.width, Math.sin(counter*.25)*this.width, 0);
		
		for (var i=0; i<this.length; i++)
		{
			var v1        = this.geom.vertices[i*2];
			var v2        = this.geom.vertices[i*2+1];
			
			v1.position.x   = this.positions[i*3] + this.rotations[i*3];
			v1.position.y   = this.positions[i*3+1] + this.rotations[i*3+1];
			v1.position.z   = this.positions[i*3+2] + this.rotations[i*3+2];
			v2.position.x   = this.positions[i*3] - this.rotations[i*3];
			v2.position.y   = this.positions[i*3+1] - this.rotations[i*3+1];
			v2.position.z   = this.positions[i*3+2] - this.rotations[i*3+2];
		}
		
		this.geom.computeFaceNormals();
		this.geom.computeVertexNormals();
		this.geom.__dirtyVertices = true;
		this.geom.__dirtyNormals  = true;
	}
}

function randomRange(min, max)
{
	return min + Math.random()*(max-min);
}