<head>

<!-- Build_A_Markdown_Preview -->

  <script>
  marked.setOptions({
  breaks: true,
    });
  </script>
  <script type="text/babel">

    class MyForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      input: '',
      submit: [],
      markdown: placeholder
    };
    this.handleChange = this.handleChange.bind(this);
  }
  handleChange(event) {
    this.setState({
      markdown: event.target.value
    });
  }


  render() {
    return (
    <div id='grid-one'>
      <Editor markdown={this.state.markdown} 
            onChange={this.handleChange} />         
      <Preview  markdown={this.state.markdown}/>
    </div>
    );
  }
};

const Editor = (props) => {
  return (
    <textarea id="editor"
      value={props.markdown}
      onChange={props.onChange}
      type="text"/>
    )
}

const Preview = (props) => {
  marked.setOptions({
  breaks: true,
});
  let markedUpText = marked(props.markdown);
  return (
    <div id='preview' dangerouslySetInnerHTML={{__html: markedUpText}} ></div>
    )
}

const placeholder = 
`

# Thanks for viewing my mini markdown previewer!

## Markdown has everything you need...

There's also [links](https://www.freecodecamp.com),
`+
  
'`<div>Using Markdown:</div>`'
+

'\n_block code is easy_\n'
+'```'+

`
const youCanLearn = () =>{
console.log('How Fun It Is!')
}
`
+
'```'+
`
1. It's quick
1. It makes sense! 
1. And best of all

> And I learned it all from:

![React Logo w/ Text](https://d33wubrfki0l68.cloudfront.net/399edfbd56860a94d3c5654ba51019817bf01495/d8901/img/freecodecamp.png)

**You can too!**
`
ReactDOM.render(<MyForm />, document.getElementById('app'));

    </script>
</head>


<body >
  <div id='app'></div>
</body>