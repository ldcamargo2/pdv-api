<?php

/**
 * @SWG\Tag(
 *      name="Authentication",
 *      description="Autenticação"
 * )
 */

/**
 * @SWG\Definition(
 *     type="object",
 *     title="Authentication model",
 *     definition="Authentication",
 *     @SWG\Property(
 *        property="email",
 *        type="string"
 *     ),
 *     @SWG\Property(
 *        property="password",
 *        type="string"
 *     ),
 * )
 */

/**
 * @SWG\Post(
 *      path="/login",
 *      operationId="login",
 *      tags={"Authentication"},
 *      summary="Authenticate User",
 *      description="Authenticate User",
 *      @SWG\Parameter(
 *          name="email",
 *          description="User email",
 *          required=true,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Parameter(
 *          name="password",
 *          description="Checklist name",
 *          required=true,
 *          type="string",
 *          in="formData"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 */

/**
 * @SWG\Post(
 *      path="/logout",
 *      operationId="logout",
 *      tags={"Authentication"},
 *      summary="Logout User",
 *      description="Logout User",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 */

/**
 * @SWG\Post(
 *      path="/me",
 *      operationId="me",
 *      tags={"Authentication"},
 *      summary="Get Authenticated User Information",
 *      description="Get Authenticated User Information",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 */

/**
 * @SWG\Post(
 *      path="/refresh",
 *      operationId="refresh",
 *      tags={"Authentication"},
 *      summary="Refresh Token",
 *      description="Refresh Token",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "default": {}
 *         }
 *     },
 * )
 */