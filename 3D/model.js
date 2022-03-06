import * as THREE from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/build/three.module.js';
import { OrbitControls } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/loaders/GLTFLoader.js';
import * as modelData from './modelData.js';

let model;

async function init(url) {
  const canvas = document.querySelector('#c');

  const renderer = new THREE.WebGLRenderer({
    canvas,
    antialias: true,
  });
  const scene = new THREE.Scene();
  // scene.background = new THREE.Color('white');
  renderer.setClearColor(0xf9f9f9, 1);

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
  const spotlight = new THREE.SpotLight(0xffffff, 1, 200, 1, 1, 2);
  spotlight.castShadow = true;
  spotlight.position.set(50, 0, 30);
  const leftlight = new THREE.SpotLight(0xffffff, 1, 200, 1, 1, 2);
  leftlight.position.set(-50, 0, 30);

  scene.add(spotlight, leftlight);
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

  // カスタマイズ　箇所の指定など

  // 全モデルのキャンバスはこうしなくちゃいけない
  const Canvas = model.getObjectByName('canvas_平面').material;

  // let customizeObj = '';
  let customizeMoyou = '';
  let Picker = [];
  let moyouResults = [];
  let tabs = '';

  let panels = '';

  // カラー変更のエリアを作る
  MDL.object.forEach((item, index) => {
    // tab作る
    tabs += `<label class="tab" id="color-${index + 1}-tab" for="color-${index + 1}">${item.name}</label>`;
    panels += `
    <div class="panel" id="color-${index + 1}-panel">
    <div class="selectcolor">
        <div>
          <div id="color-area">${item.name} <input type="color" id="${item.name}" value="${item.color}" /></div>
          <p>画像から色をカスタマイズ</p><span>※カラーパレットのスポイト<img src="./images/spuit.png" alt="">から<br>　色を選択できます<br></span>
          <input type="file" onChange="imgPreView(event, 'preview${index + 1}')" class="stepbtn1" id="file${
      index + 1
    }" />
          <label for="file${index + 1}">画像選択</label>
        </div>
        <div class="uploadimg" id="preview${index + 1}"></div>
      </div>
    </div>`;

    Picker[index] = [item.name, item.value, '0x' + item.color.slice('1')];
  });
  $('#tabs').html(tabs);
  $('#panels').html(panels);

  // 模様変更のエリアを作る
  if (MDL.moyou.length > 0) {
    customizeMoyou = '装飾：<br>';
    MDL.moyou.forEach((item, index) => {
      customizeMoyou += `<input type="checkbox" id="${
        item.value
      }" name="${index}" class="decobtn" checked> <label for="${item.value}"><img src="images/${MDL.name}-${
        index + 1
      }.jpg" /></label>`;
      moyouResults.push(true);
    });
  }
  $('#moyou-area').html(customizeMoyou);
  $('.decobtn').on('change', function () {
    model.getObjectByName($(this)[0].id).material.visible = !model.getObjectByName($(this)[0].id).material.visible;

    moyouResults[$(this)[0].name] = $(this).prop('checked');
    // console.log(moyouResults);
  });
  // カラーピッカーのイベントハンドラー

  Picker.forEach((x) => {
    $('#' + x[0]).on('change', function () {
      let color =
        '0x' +
        $('#' + x[0])
          .val()
          .slice(1);
      x[1].forEach((val) => model.getObjectByName(val).material.color.setHex(color));
      x[2] = color;
    });
  });

  model.traverse((object) => {
    if (object.isMesh) {
      object.material.transparent = true;
    }
  });
  //位置調整
  const box = new THREE.Box3().setFromObject(model);
  const modelW = box.max.x - box.min.x;
  const modelH = box.max.y - box.min.y;
  // const modelD = box.max.z - box.min.z;

  // ラジオボタンでサイズ切り替え
  let MDLSize = 'sm';
  document.getElementsByName('size').forEach((r) =>
    r.addEventListener('change', (e) => {
      let SC = MDL.scale;
      if (e.target.value == 'sm') {
      } else if (e.target.value == 'md') {
        SC *= 1.5;
        MDLSize = 'md';
      } else if (e.target.value == 'lg') {
        SC *= 2;
        MDLSize = 'lg';
      }
      controls.reset();
      model.scale.set(SC, SC, SC);
    })
  );

  // texture変更
  // var filechange = document.getElementById('file');
  // filechange.addEventListener('change', textureSwitch, false);

  var img = document.createElement('img');
  img.src = '/001.jpg';

  // テクスチャの更新（meshは作成済みのオブジェクト）
  Canvas.side = THREE.doubleSide;
  Canvas.map = new THREE.Texture(img);
  Canvas.map.needsUpdate = true;

  // 写真プレビューを切る
  const imgPreview = $('#image-preview');
  imgPreview.on('click', () => {
    if (!imgPreview.prop('checked')) {
      img.src = '/000.jpg';
    } else {
      img.src = '/001.jpg';
    }
    Canvas.map = new THREE.Texture(img);
    Canvas.map.needsUpdate = true;
  });

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
      Canvas.side = THREE.DoubleSide;
      Canvas.map = new THREE.Texture(img);
      Canvas.map.needsUpdate = true;
      console.log(Canvas.map);
    };
    // データURLとしてファイルを読み込む
    reader.readAsDataURL(file);
  }
  // 位置設定
  model.position.set(-modelW / 60, -modelH / 10, -25);

  let Direction = 'yoko';
  $('#tate').on('click', () => {
    Direction = 'tate';
    directionChange(Direction);
  });
  $('#yoko').on('click', () => {
    Direction = 'yoko';
    directionChange(Direction);
  });
  function directionChange() {
    if (Direction == 'tate') {
      model.rotation.set(0, 0, -Math.PI / 2);
    } else {
      model.rotation.set(0, 0, 0);
    }
  }

  // console.log(modelW / camera.position.z);

  model.scale.set(MDL.scale, MDL.scale, MDL.scale);
  scene.add(model);
  // いらないかも？
  renderer.setAnimationLoop(tick);

  // ar url作成
  const arBtn = document.querySelector('#arBtn');

  // let arLink = 'https://iwnb3.csb.app/?';
  let arLink = 'https://farme-test.herokuapp.com/ar.html?'; //heroku test 環境

  arBtn.addEventListener('click', (e) => {
    // idとりあえず1でお試し

    let Param = [{ id: MDL.id }, { size: MDLSize }, { dir: Direction }, { moyou: moyouResults }];
    Picker.forEach((x) => {
      let obj = new Object();
      obj[x[0]] = x[2];
      Param.push(obj);
    });

    let urlParam = '';
    Param.forEach((x) => {
      urlParam += Object.keys(x) + '=' + Object.values(x) + '&';
    });

    arLink = arLink + urlParam;
    console.log(arLink);
    $(function () {
      var qrtext = arLink;
      var utf8qrtext = unescape(encodeURIComponent(qrtext));
      $('#qr').html('');
      $('#qr').qrcode({ width: 160, height: 160, text: utf8qrtext });
      $('#qr').show();
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
  console.log(model.children);
  // console.log(modelData.products[0].name);
}
// モデル切り替え
let MDL = modelData.products[0];

$('.modelicon').on('click', function () {
  let ID = Number($(this).attr('id'));
  MDL = modelData.products[ID];
  setUrl();
  // init(url);
  console.log(`モデル${ID}`, url);
});
// デフォルトのモデルパス！
let url = '3D/model/' + MDL.name + '_' + MDL.sm + '.glb';
function setUrl() {
  url = '3D/model/' + MDL.name + '_' + MDL.sm + '.glb';
  init(url);
}
// 初期化
window.addEventListener('load', init(url));
const resetBtn = document.querySelector('#resetBtn');
resetBtn.addEventListener('click', () => {
  // qrをリセット
  $('#qr').hide();
  init(url);
});

// サイズ切り替え init()の中で実行することにした
// const modelNo = document.querySelector('#size-selector');
// modelNo.addEventListener('change', (e) => {
//   console.log('change', modelNo.value);
//   if (modelNo.value == 'sm') {
//     url = '3D/model/' + MDL.name + '_' + MDL.sm + '.glb';
//     model.scale.set(MDL.scale, MDL.scale, MDL.scale);
//   } else if (modelNo.value == 'md') {
//     let SC = MDL.scale * 1.5;
//     controls.reset();
//     model.scale.set(SC, SC, SC);
//   } else if (modelNo.value == 'lg') {
//     let SC = MDL.scale * 2;
//     model.scale.set(SC, SC, SC);
//   }
// });

export default model;
