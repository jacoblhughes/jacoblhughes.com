<head>
  
  <!-- BUILD A DRUM MACHINE -->

<script type="text/babel">

class MyForm extends React.Component {
  constructor(props) {
    super(props);
    
    
    this.state = {
      sounds: [{letter:'Q',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Heater-1.mp3',rank:0,key:'81',description:'Heater 1'}
      ,{letter:'W',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Heater-2.mp3',rank:1,key:'87',description:'Heater 2'}
      ,{letter:'E',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Heater-3.mp3',rank:2,key:'69',description:'Heater 3'}
      ,{letter:'A',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Heater-4_1.mp3',rank:3,key:'65',description:'Heater 4'}
      ,{letter:'S',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Heater-6.mp3',rank:4,key:'83',description:'Heater 6'}
      ,{letter:'D',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Kick_n_Hat.mp3',rank:5,key:'68',description:'Open-HH'}
      ,{letter:'Z',sound: 'https://s3.amazonaws.com/freecodecamp/drums/RP4_KICK_1.mp3',rank:6,key:'90',description:'Kick-n\'-Hat'}
      ,{letter:'X',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Cev_H2.mp3',rank:7,key:'88',description:'Kick'}
      ,{letter:'C',sound: 'https://s3.amazonaws.com/freecodecamp/drums/Dry_Ohh.mp3',rank:8,key:'67',description:'Dry_Ohh'}
      ],
      currentSound: '',
    };
    // this.keyPressing = this.keyPressing.bind(this);
    this.soundDisplayChange = this.soundDisplayChange.bind(this);
    this.handleKeyPress = this.handleKeyPress.bind(this);
    this.soundDisplayChangeKey = this.soundDisplayChangeKey.bind(this);
  }

  componentDidMount() {
    document.addEventListener('keydown', this.handleKeyPress);
  }

  handleKeyPress(e) {
    console.log(e.keyCode)

      this.soundDisplayChangeKey(e.keyCode);
    
  }

  soundDisplayChange(props,rank) {
    this.setState({
      currentSound: props.array[rank].description
    });
    let snd = new Audio(props.array[rank].sound)
    snd.play();
  }

   soundDisplayChangeKey(keyCode) {
    console.log(keyCode);
    let myObject = this.state.sounds.filter(x=>x.key == keyCode);
    myObject = myObject[0];
    console.log(myObject);
    this.setState({
      currentSound: myObject.description
    });
    let snd = new Audio(myObject.sound)
    snd.play();
  }

  render() {
    return (
    <div id='whole-thing'>
      <h1 id='title-head'></h1>
      
      <FormGrid array={this.state.sounds} soundDisplayChange={this.soundDisplayChange} />
      <SoundDisplay letter={this.state.currentSound} />
      
    </div>
    
    );
  }
};

const FormGrid = (props) =>{
  return(
    <div id='drum-machine'>{props.array.map(x=>
    <button key={x.letter.toString()} id={x.letter} className="drum-pad" onClick={()=>{props.soundDisplayChange(props,x.rank)}}>{x.letter}</button>
    )}</div>
  )
}

const SoundDisplay = (props) =>{
  return(
    <p id='display'>{props.letter}</p>
  )
}

ReactDOM.render(<MyForm />, document.getElementById('app'));

    </script>
</head>


<body id="root-element">
  <div id='app'></div>
</body>