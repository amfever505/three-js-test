import * as THREE from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/build/three.module.js';
import { OrbitControls } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/loaders/GLTFLoader.js';
import * as modelData from './modelData.js';

let model;

async function init(url) {
  const canvas = document.querySelector('#model-preview');

  const renderer = new THREE.WebGLRenderer({
    canvas,
    antialias: true,
  });
  const scene = new THREE.Scene();
  // scene.background = new THREE.Color('white');
  renderer.setClearColor(0xffffff, 1);

  const width = 640;
  const height = 480;

  renderer.setPixelRatio(1);
  renderer.setSize(width, height);
  // カメラ設定
  const camera = new THREE.PerspectiveCamera(45, width / height, 1, 10000);
  camera.position.set(0, 0, 60);

  const controls = new OrbitControls(camera, renderer.domElement);
  // ライティング
  renderer.shadowMap.enabled = true;
  const light = new THREE.AmbientLight(0xffffff, 1);
  const spotlight = new THREE.SpotLight(0xffffff, 2, 200, Math.PI / 2, 1, 2);
  spotlight.castShadow = true;
  spotlight.position.set(0, 0, 60);
  scene.add(spotlight);
  scene.add(light);
  renderer.outputEncoding = THREE.GammaEncoding;

  // モデルloader
  const loader = new GLTFLoader();
  model = await (() => {
    return new Promise((resolve) => {
      loader.load(
        url,
        (gltf) => {
          resolve(gltf.scene);
        },
        (err) => {
          console.error(err);
        }
      );
    });
  })();

  // カスタマイズ
  const WakuPicker = document.querySelector('#waku');
  const UraPicker = document.querySelector('#ura');
  const Waku = model.getObjectByName('frame').material;
  const Ura = model.getObjectByName('ura').material;
  const Canvas = model.getObjectByName('canvas').material;
  model.getObjectByName('ura').visible = false;
  model.traverse((object) => {
    if (object.isMesh) {
      object.material.transparent = true;
    }

    WakuPicker.addEventListener('change', (e) => {
      let color = '0x' + WakuPicker.value.slice(1);
      Waku.color.setHex(color);
    });
    UraPicker.addEventListener('change', (e) => {
      let color = '0x' + UraPicker.value.slice(1);
      Ura.color.setHex(color);
    });
  });
  //位置調整
  const box = new THREE.Box3().setFromObject(model);
  const modelW = box.max.x - box.min.x;
  const modelH = box.max.y - box.min.y;
  // const modelD = box.max.z - box.min.z;

  // texture変更
  var filechange = document.getElementById('file');
  filechange.addEventListener('change', textureSwitch, false);

  function textureSwitch(event) {
    // 要素内イベントのキャンセル
    event.preventDefault();

    // ファイルを読み込む　→デフォルトにする
    var file = event.target.files[0];

    // FileReader オブジェクトの作成
    var reader = new FileReader();

    reader.onload = function (event) {
      // 「img」でエレメントオブジェクト作成
      var img = document.createElement('img');
      img.src = event.target.result;

      // テクスチャの更新（meshは作成済みのオブジェクト）
      // Canvas.side = THREE.DoubleSide;
      Canvas.map = new THREE.Texture(img);
      Canvas.map.needsUpdate = true;
      console.log(Canvas.map);
    };
    // データURLとしてファイルを読み込む
    reader.readAsDataURL(file);
  }
  // 位置設定
  model.position.set(-modelW / 60, -modelH / 10, -25);
  console.log(modelW / camera.position.z);

  model.scale.set(0.2, 0.2, 0.2);
  scene.add(model);
  // いらないかも？
  renderer.setAnimationLoop(tick);

  // ar url作成
  const arBtn = document.querySelector('#arBtn');

  // let arLink = 'https://iwnb3.csb.app/?';
  let arLink = 'https://farme-test.herokuapp.com/ar.html?'; //heroku test 環境

  arBtn.addEventListener('click', (e) => {
    // idとりあえず1でお試し
    arLink = arLink + 'id=1&Waku=' + WakuPicker.value.slice(1) + '&Ura=' + UraPicker.value.slice(1);
    console.log(arLink);
    $(function () {
      var qrtext = arLink;
      var utf8qrtext = unescape(encodeURIComponent(qrtext));
      $('#qr').html('');
      $('#qr').qrcode({ width: 160, height: 160, text: utf8qrtext });
    });

    arLink = 'https://farme-test.herokuapp.com/ar.html?';
  });
  // アニメーション関連
  function tick() {
    controls.update();

    // if (model) {
    //   model.rotation.x += 0;
    // }
    renderer.render(scene, camera);
  }

  // Mesh であるやつを取得
  // console.log(model.children);
  // console.log(modelData.products[0]);
}

let url = '3D/model/frame2_golden_509_394.glb';
// 初期化
window.addEventListener('load', init(url));
const resetBtn = document.querySelector('#resetBtn');
resetBtn.addEventListener('click', () => {
  init(url);
});
// サイズ切り替え
const modelNo = document.querySelector('#model-no');
modelNo.addEventListener('change', (e) => {
  if (modelNo.value == 1) {
    url = '3D/model/frame2_golden_379_288.glb';
  } else if (modelNo.value == 2) {
    url = '3D/model/frame2_golden_509_394.glb';
  } else if (modelNo.value == 3) {
    url = '3D/model/frame2_golden_606_455.glb';
  }
  init(url);
});

export default model;
