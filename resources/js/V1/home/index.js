import React from 'react';
import Nav from '../components/nav'
import '../layouts/index_css';
import Section from "../components/section";
import $ from 'jquery';

class Index extends React.Component {
    constructor(props) {
        super(props);
        this.state = {};
    }

    componentDidMount() {
        $('.js-scroll-trigger').click(function() {
            $('.navbar-collapse').collapse('hide');
        });
    }

    render() {
        return (
            <div>
                <Nav/>
                <Section/>
            </div>
        );
    }
}

export default Index;