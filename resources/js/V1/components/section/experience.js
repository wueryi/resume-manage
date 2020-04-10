import React from 'react';
import Axios from "axios";
import {Host} from '../../config';

class Experience extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            experience: []
        };
    }

    componentWillMount() {
        const _this = this;
        Axios.get(Host+"/api/index/get-experience")
            .then(function (response) {
                _this.setState({
                    experience: response.data.result
                })
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        const experience = this.state.experience;
        return (
            <section className="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
                <div className="my-auto">
                    <h2 className="mb-5">项目经历</h2>

                    {
                        Object.keys(experience).map(key => {
                            return (
                                <div className="resume-item d-flex flex-column flex-md-row mb-5" key={key}>
                                    <div className="resume-content mr-auto">
                                        <h3 className="mb-0">{experience[key].name}</h3>
                                        <div className="subheading mb-3">{experience[key].skill}</div>
                                        <div>
                                            <h6>项目概述:</h6>
                                            <p>{experience[key].brief}</p>
                                        </div>
                                        <div>
                                            <h6>负责内容:</h6>
                                            <p>{experience[key].responsibility}</p>
                                        </div>

                                        {
                                            (()=>{
                                                if (experience[key].difficulty) {
                                                    return (
                                                        <div>
                                                            <h6>项目难点:</h6>
                                                            <p>{experience[key].difficulty}</p>
                                                        </div>
                                                    )
                                                }
                                            })()
                                        }
                                        {
                                            (()=>{
                                                if (experience[key].achievement) {
                                                    return (
                                                        <div>
                                                            <h6>项目成果:</h6>
                                                            <p>{experience[key].achievement}</p>
                                                        </div>
                                                    )
                                                }
                                            })()
                                        }

                                    </div>
                                    <div className="resume-date text-md-right">
                                        <span
                                            className="text-primary">{experience[key].begin_at} - {experience[key].end_at}</span>
                                    </div>
                                </div>
                            )
                        })
                    }
                </div>

            </section>
        );
    }
}

export default Experience;