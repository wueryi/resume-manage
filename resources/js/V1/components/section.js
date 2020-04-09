import React from 'react';
import About from "./section/about";
import Experience from "./section/experience";
import Education from "./section/education";
import Skills from "./section/skills";
import Work from "./section/work";
import Info from "./section/info";
import Evaluate from "./section/evaluate";

class Section extends React.Component{
    constructor(props){
        super(props);
        this.state={};
    }

    render() {
        return (
            <div className="container-fluid p-0">
                <About/>
                <Info/>
                <Work />
                <Skills/>
                <Experience/>
                <Education/>
                <Evaluate/>
            </div>
        );
    }
}

export default Section;