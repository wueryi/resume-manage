import React from 'react';
import Axios from 'axios';
import {Host} from '../../config';

class Skills extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            skills: []
        };
    }

    componentWillMount() {
        const _this = this;
        Axios.get(Host+"/api/index/get-skill")
            .then(function (response) {
                _this.setState({
                    skills: response.data.result
                })
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        return (
            <section className="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
                <div className="my-auto">
                    <h2 className="mb-5">个人技能</h2>

                    <div className="subheading mb-3">技能图谱</div>
                    <ul className="list-inline list-icons">
                        <li className="list-inline-item">
                            <i className="devicons devicons-linux"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-nginx"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-php"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-mysql"></i>
                        </li>
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-nodejs"></i>*/}
                        {/*</li>*/}
                        <li className="list-inline-item">
                            <i className="devicons devicons-java"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-python"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-html5"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-javascript"></i>
                        </li>
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-composer"></i>*/}
                        {/*</li>*/}
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-npm"></i>*/}
                        {/*</li>*/}
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-laravel"></i>*/}
                        {/*</li>*/}
                        <li className="list-inline-item">
                            <i className="devicons devicons-react"></i>
                        </li>
                        <li className="list-inline-item">
                            <i className="devicons devicons-redis"></i>
                        </li>
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-jquery"></i>*/}
                        {/*</li>*/}
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-bootstrap"></i>*/}
                        {/*</li>*/}
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-github"></i>*/}
                        {/*</li>*/}
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-chrome"></i>*/}
                        {/*</li>*/}
                        {/*<li className="list-inline-item">*/}
                        {/*<i className="devicons devicons-markdown"></i>*/}
                        {/*</li>*/}
                    </ul>

                    <div className="subheading mb-3">技能详情</div>
                    <ul className="fa-ul mb-0">
                        {
                            Object.keys(this.state.skills).map((key) => {
                                return (
                                    <li key={key}>
                                        <i className="fa-li fa fa-trophy text-warning"/>
                                        <h5>{this.state.skills[key].content}</h5>
                                        <br/>
                                    </li>
                                )
                            })
                        }
                    </ul>
                </div>
            </section>
        );
    }
}

export default Skills;