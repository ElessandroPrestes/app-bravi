import React, {Suspense, lazy} from 'react'
import { BrowserRouter as Router, Route, Switch}  from 'react-router-dom'
import { CircularProgress } from '@mui/material'

const Register = lazy( () => import('./Register'));

const RoutesDefault = ()  => (
    <Router>
        <Suspense fallback={<div className='d-flex justify-content-center mt-6 pt-5'> <CircularProgress /></div>}>
            <Switch>
                <Route exact path="/register" component={Register} />
            </Switch>
        </Suspense>
    </Router>
)

export default RoutesDefault;