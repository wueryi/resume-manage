import React from 'react';
import Axios from "axios";
import {Host} from '../../config';

class Work extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            works: []
        };
    }

    componentWillMount() {
        const _this = this;
        Axios.get(Host+"/api/index/get-work")
            .then(function (response) {
                _this.setState({
                    works: response.data.result
                })
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        const works = this.state.works;
        return (
            <section className="resume-section p-3 p-lg-5 d-flex flex-column" id="work">
                <div className="my-auto">
                    <h2 className="mb-5">工作经历</h2>
                    {
                        Object.keys(works).map(key => {
                            return (
                                <div key={key} className="resume-item d-flex flex-column flex-md-row mb-5">
                                    <div className="resume-content mr-auto">
                                        <h3 className="mb-0">{works[key].company}</h3>
                                        <div className="subheading mb-3">{works[key].position}</div>
                                    </div>
                                    <div className="resume-date text-md-right">
                                        <span className="text-primary">{works[key].begin_at} - {works[key].end_at}</span>
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

export default Work;