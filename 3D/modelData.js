export const products = [
  {
    id: 0,
    name: 'frame001',
    lg: 'l',
    md: 'm',
    sm: 'sm',
    object: [
      { name: '外枠', value: ['frame_Cube003'], color: '#7E7853' },
      { name: '内枠', value: ['frame_inner_Cube001'], color: '#361402' },
      { name: '模様', value: ['moyou001_Lines001', 'moyou021_Lines002', 'moyou002_Lines'], color: '#C59B48' },
    ],
    moyou: [
      { name: '模様1', value: 'moyou001_Lines001' },
      { name: '模様2', value: 'moyou021_Lines002' },
      { name: '模様3', value: 'moyou002_Lines' },
    ],
    scale: 1,
  },
  {
    id: 1,
    name: 'frame002',
    lg: 'l',
    md: 's',
    sm: 's',
    object: [
      { name: '枠', value: ['frame_inner_Cube001'], color: '#9a760f' },
      { name: '裏', value: ['frame_Cube003'], color: '#d2a77e' },
    ],
    moyou: [
      // { name: '模様1', value: 'moyou001_Lines001' },
      // { name: '模様2', value: 'moyou021_Lines002' },
      // { name: '模様3', value: 'moyou002_Lines' },
    ],
    scale: 1,
  },

  { id: 2, name: 'frame2_golden', lg: '', md: '', sm: '', object: ['ura', 'waku'] },
  { id: 3, name: 'frame2_golden', lg: '', md: '', sm: '', object: ['ura', 'waku'] },
  { id: 4, name: 'frame2_golden', lg: '', md: '', sm: '', object: ['ura', 'waku'] },
  { id: 5, name: 'frame2_golden', lg: '', md: '', sm: '', object: ['ura', 'waku'] },
];

// export const products2 = [1, 2, 3, 4, 5, 6];
